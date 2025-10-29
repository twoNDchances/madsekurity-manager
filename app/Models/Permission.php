<?php

namespace App\Models;

use App\Observers\PermissionObservers\PermissionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

#[ObservedBy(PermissionObserver::class)]
class Permission extends Model
{
    protected $fillable = [
        'name',
        'description',
        'action',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'name'        => 'string',
            'description' => 'string',
            'action'      => 'string',
            'user_id'     => 'integer',
        ];
    }

    private static array $methodDescriptions = [
        'all'       => 'Full',
        'viewAny'   => 'List',
        'view'      => 'View',
        'create'    => 'Create',
        'update'    => 'Update',
        'deleteAny' => 'Multi-Delete',
        'delete'    => 'Delete',
    ];

    private static array $exclusionList = [
        //
    ];

    public static function getPolicyPermissionOptions(): array
    {
        $policiesPath = App::path('Policies');
        $files        = glob("$policiesPath/*.php");
        $permissions  = [];
        foreach ($files as $file)
        {
            $className = 'App\\Policies\\' . basename($file, '.php');
            if (!class_exists($className))
            {
                require_once $file;
            }
            if (!class_exists($className))
            {
                continue;
            }
            $resource = Str::lower(preg_replace('/Policy$/', '', class_basename($className)));
            $methods  = get_class_methods($className);
            foreach ($methods as $method)
            {
                if (!isset(self::$methodDescriptions[$method]))
                {
                    continue;
                }
                $key = "$resource.$method";
                $label = Str::ucfirst($resource) . ':' . self::$methodDescriptions[$method];
                $permissions[$key] = $label;
            }
        }
        return $permissions;
    }

    public static function flattenExclusionList(): array
    {
        $result = [];
        foreach (self::$exclusionList as $module => $permissions)
        {
            foreach ($permissions as $permission)
            {
                $result[] = "$module.$permission";
            }
        }
        return $result;
    }

    public static function getAvailablePermissions(): array
    {
        $permissions = [];
        $allPermissions = self::getPolicyPermissionOptions();
        $excluded = self::flattenExclusionList();
        foreach ($allPermissions as $key => $value)
        {
            if (in_array($key, $excluded))
            {
                continue;
            }
            $permissions[$key] = $value;
        }
        return $permissions;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function policies()
    {
        return $this->belongsToMany(Policy::class, 'policies_permissions');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labellable');
    }
}
