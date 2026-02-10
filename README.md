<!-- @format -->

# Base64 File decoder and encoder :raised_hand:

- This repository contains standalone PHP base64 file decoder and encoder

#### Installation

```
composer require devishdi/base64-file-decode-encode
```

## How to Use

```php
//Decode
$decoder = new Base64FileDecode($type);

//$type can be `image` or `spread_sheet` or `pdf` or `doc` or `json`

$decoder->decode($data)

//$data = Base 64 file data

//Encode

$encoder = new Base64FileEncode($type));

//$type can be `image` or `spread_sheet` or `pdf` or `doc` or `json`

$encoder->encode($data, $format)

//$data = Base 64 file data
//$format = Valid file extension

//Get allowed formats
$decoder->getAllowedFileFormats()

```
