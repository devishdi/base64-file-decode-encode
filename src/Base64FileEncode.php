<?php

namespace Devishdi\Base64FileDecodeEncode;

use Exception;
use Throwable;

class Base64FileEncode extends Base64Base
{
    public function encode(string $data, string $fileFormat): ?string
    {
        try {
            $this->format = $fileFormat;
            $this->checkValidFormat();

            $encoded = base64_encode($data);

            if (empty($encoded)) {
                throw new Exception('File Invalid');
            }

            return sprintf('data:application/%s;base64,%s', $this->format, $data);
        } catch (Throwable $e) {
            error_log($e->getMessage());

            return null;
        }
    }
}
