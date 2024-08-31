<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class ImageRule implements ValidationRuleInterface
{
    protected array $formatSupport;

    public function __construct(protected string $format)
    {
        $this->formatSupport = explode(',', $this->format);
    }

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        $imageInfo = @getimagesize($value);

        if ($imageInfo === false) {
            return false;
        }

        $imageMimeType = $imageInfo['mime'];
        $imageExtension = $this->getExtensionFromMimeType($imageMimeType);

        return in_array($imageExtension, $this->formatSupport, true);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        $formats = implode(', ', $this->formatSupport);
        return "{$field} must be a valid image in one of the following formats: {$formats}.";
    }

    /**
     * Convert MIME type to file extension.
     *
     * @param string $mimeType
     * @return string
     */
    protected function getExtensionFromMimeType(string $mimeType): string
    {
        $mimeMap = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'image/bmp' => 'bmp',
            'image/tiff' => 'tiff',
        ];

        return $mimeMap[$mimeType] ?? '';
    }
}
