<?php

namespace PdfApi\Parameter;
use PdfApi\Exception\InvalidParameterValueException;

/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 11:35
 */
class Margin
{

    private $top;
    private $right;
    private $bottom;
    private $left;

    public function __construct($top = null, $right = null, $bottom = null, $left = null)
    {
        $this->setTop($top);
        $this->setRight($right);
        $this->setBottom($bottom);
        $this->setLeft($left);
    }

    public function setParameters(array $parameters)
    {
        if (isset($parameters['top'])) {
            $this->setTop($parameters['top']);
        }

        if (isset($parameters['right'])) {
            $this->setRight($parameters['right']);
        }

        if (isset($parameters['bottom'])) {
            $this->setBottom($parameters['bottom']);
        }

        if (isset($parameters['left'])) {
            $this->setLeft($parameters['left']);
        }
    }

    /**
     * @return double
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param double $top
     */
    public function setTop($top)
    {
        $top = (double) $top;
        if ($top < 0) {
            throw new InvalidParameterValueException();
        }
        $this->top = $top;
    }

    /**
     * @return double
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param double $right
     */
    public function setRight($right)
    {
        $right = (double) $right;
        if ($right < 0) {
            throw new InvalidParameterValueException();
        }
        $this->right = $right;
    }

    /**
     * @return double
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * @param double $bottom
     */
    public function setBottom($bottom)
    {
        $bottom = (double) $bottom;
        if ($bottom < 0) {
            throw new InvalidParameterValueException();
        }
        $this->bottom = $bottom;
    }

    /**
     * @return double
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param double $left
     */
    public function setLeft($left)
    {
        $left = (double) $left;
        if ($left < 0) {
            throw new InvalidParameterValueException();
        }
        $this->left = $left;
    }

    public function toArray()
    {
        return [
            'top' => $this->top,
            'right' => $this->right,
            'bottom' => $this->bottom,
            'left' => $this->left,
        ];
    }
}