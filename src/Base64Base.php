<?php

namespace Devishdi\Base64FileDecodeEncode;

use Exception;

abstract class Base64Base
{
    public const TYPES = ['image', 'spread_sheet', 'pdf', 'doc', 'json'];

    public const FORMAT_IMAGE = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'avif', 'svg+xml', 'apng', 'tiff', 'bmp'];

    public const FORMAT_SPREAD_SHEET = ['csv', 'vnd.ms-excel', 'vnd.oasis.opendocument.spreadsheet', 'vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    public const FORMAT_DOC = ['rtf', 'vnd.oasis.opendocument.text', 'vnd.openxmlformats-officedocument.wordprocessingml.document'];

    public const FORMAT_PDF = ['pdf'];

    public const FORMAT_JSON = ['json'];

    protected string $format = '';

    public function __construct(public string $type = 'image')
    {
        $this->checkValidType();
    }

    public function checkValidType(): void
    {
        if (! in_array($this->type, self::TYPES)) {
            throw new Exception(sprintf('%s is not a valid type', $this->type));
        }
    }

    /**
     * @return string[]
     */
    public function getAllowedFileFormats(): array
    {
        return match ($this->type) {
            'image' => self::FORMAT_IMAGE,
            'spread_sheet' => self::FORMAT_SPREAD_SHEET,
            'pdf' => self::FORMAT_PDF,
            'doc' => self::FORMAT_DOC,
            'json' => self::FORMAT_JSON,
            default => [],
        };
    }

    public function getFileFormat(): string
    {
        return $this->format;
    }

    protected function checkValidFormat(): void
    {
        if (! in_array($this->format, $this->getAllowedFileFormats())) {
            throw new Exception(sprintf('%s is not an allowed file format', $this->format));
        }
    }
}
