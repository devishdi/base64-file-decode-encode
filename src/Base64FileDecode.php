<?php

namespace Devishdi\Base64FileDecodeEncode;

use Exception;
use Throwable;

class Base64FileDecode extends Base64Base
{
    public function decode(string $data): ?string
    {
        try {
            $fileData = explode(',', $data);
            $format = preg_replace(['/data:(application|text|image)\//', '/;/', '/base64/'], '', $fileData[0]);
            $this->format = is_string($format) ? $format : '';
            $this->checkValidFormat();

            $decoded = base64_decode($fileData[1] ?? '', true);

            if (empty($decoded)) {
                throw new Exception('File Invalid');
            }

            return $decoded;
        } catch (Throwable $e) {
            error_log($e->getMessage());

            return null;
        }
    }
}
