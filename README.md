[![Build Status](https://travis-ci.org/pdfapi/php-sdk.svg?branch=master)](https://travis-ci.org/pdfapi/php-sdk)
[![Coverage Status](https://coveralls.io/repos/github/pdfapi/php-sdk/badge.svg?branch=master)](https://coveralls.io/github/pdfapi/php-sdk?branch=master)

# pdfapi.io SDK for PHP

## Installation

pdfapi.io PHP SDK can be installed with [Composer](https://getcomposer.org/). Run this command:

```sh
composer require pdfapi/php-sdk
```


## Usage

Usage of pdfapi.io PHP SDK is very simple. The easyest way to get started is:

```php

use PdfApi\PdfApi;

$template = <<<HTML
<html>
    <body>
        <h1>pdfapi.io makes PDF generation so easy.</h1>
        <p>And it can do complicated stuff.</p>
    </body>
</html>
HTML;

$pdfApi = new PdfApi('YOUR_API_KEY');
$pdfApi->setHtml($template);

$rawPdf = $pdfApi->covert();
```

Full example of the usage:
Note: Be aware that header and footer are separate HTML documents (with styles and everything) that are copied to each page.
```php

use PdfApi\PdfApi;
use PdfApi\Parameter\OrientationEnum;
use PdfApi\Parameter\SizeEnum;

$template = <<<HTML
<html>
    <body>
        <h1>pdfapi.io makes PDF generation so easy.</h1>
        <p>And it can do complicated stuff.</p>
    </body>
</html>
HTML;

$header = <<<HTML
<html>
  <body>
      <p>pdfapi.io</p>
  </body>
</html>
HTML;

$footer = <<<HTML
<html>
  <body>
      <p>pdfapi.io</p>
  </body>
</html>
HTML;


$pdfApi = new PdfApi('YOUR_API_KEY');
$pdfApi->setHtml($template);
$pdfApi->setHeader($header);
$pdfApi->setFooter($footer);
$pdfApi->setSize(SizeEnum::A4);
$pdfApi->setOrientation(OrientationEnum::Landscape);

$rawPdf = $pdfApi->generate();

//or optionally you can save PDF directly to file
$pdfApi->save('/path/to/file.pdf');

```

For getting API KEY you need to register account at https://pdfapi.io. Generating API KEY will take you 10 seconds. And it is free. Really.