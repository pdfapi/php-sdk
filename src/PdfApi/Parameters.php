<?php

namespace PdfApi;
use PdfApi\Exception\InvalidParameterValueException;
use PdfApi\Parameter\Margin;
use PdfApi\Parameter\OrientationEnum;
use PdfApi\Parameter\SizeEnum;

/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 11:24
 */
class Parameters
{

    private $contents;
    private $header;
    private $footer;
    private $size;
    private $orientation;

    /**
     * @var Margin
     */
    private $margins;

    public function __construct(array $parameters = null)
    {
        if ($parameters != null) {
            $this->setParameters($parameters);
        }
    }

    public function setParameters(array $parameters)
    {
        if (isset($parameters['html'])) {
            $this->setContents($parameters['html']);
        }

        if (isset($parameters['header'])) {
            $this->setHeader($parameters['header']);
        }

        if (isset($parameters['footer'])) {
            $this->setFooter($parameters['footer']);
        }

        if (isset($parameters['size'])) {
            $this->setSize($parameters['size']);
        }

        if (isset($parameters['orientation'])) {
            $this->setOrientation($parameters['orientation']);
        }

        if (isset($parameters['margins'])) {
            $margins = new Margin();
            $margins->setParameters($parameters['margins']);
            $this->setMargins($margins);
        }
    }

    public function getParameters()
    {
        return $this->toArray();
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param string $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param string $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        if (!defined(SizeEnum::class . '::' . $size)) {
            throw new InvalidParameterValueException('Size ' . $size . ' does not exists.');
        }
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param string $orientation
     */
    public function setOrientation($orientation)
    {
        if (!defined(OrientationEnum::class . '::' . $orientation)) {
            throw new InvalidParameterValueException('Orientation ' . $orientation . ' does not exists.');
        }
        $this->orientation = $orientation;
    }

    /**
     * @param Margin $margin
     */
    public function setMargins(Margin $margin)
    {
        $this->margins = $margin;
    }

    /**
     * @return Margin
     */
    public function getMargins()
    {
        return $this->margins;
    }

    public function toArray() {
        return [
            'html' => $this->contents,
            'header' => $this->header,
            'footer' => $this->footer,
            'orientation' => $this->orientation,
            'size' => $this->size,
            'margins' => $this->margins != null ? $this->margins->toArray() : null,
        ];
    }

}