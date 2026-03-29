<?php

namespace App\Services;

use App\Schemas\Generals\Method;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HttpRequestService
{
    use Method;

    public static function perform($url, $method = 'GET', $body = null, $username = null, $password = null, $certificate = null): Response|string
    {
        $response = null;
        try
        {
            if (!\in_array($method, array_keys(self::$methods['options'])))
            {
                throw new Exception("$method not found");
            }
            $method = Str::lower($method);
            $request = Http::withUserAgent('');
            if ($username && $password)
            {
                $request = $request->withBasicAuth($username, $password);
            }
            if ($certificate)
            {
                $filePath = self::createCertificateFile($certificate);
                $request = $request->withOptions(['verify' => $filePath]);
            }
            $response = $request->$method($url, $body);
        }
        catch (Exception $exception)
        {
            $response = $exception->getMessage();
        }
        if ($certificate)
        {
            self::deleteCertificateFile($filePath);
        }
        return $response;
    }

    private static function createCertificateFile($certificate)
    {
        $path = Storage::path('certificates');
        File::ensureDirectoryExists($path);
        $name     = Str::uuid();
        $filePath = "$path/$name.crt";
        if (!File::put($filePath, $certificate))
        {
            throw new Exception("Can't create certificate file at $filePath");
        }
        return $filePath;
    }

    private static function deleteCertificateFile($filePath)
    {
        if (!File::delete($filePath))
        {
            throw new Exception("Can't delete certificate file at $filePath");
        }
    }
}
