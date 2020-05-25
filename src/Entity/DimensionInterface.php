<?php

declare(strict_types=1);

/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017-2020 Michael Dekker (https://github.com/firstred)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author    Michael Dekker <git@michaeldekker.nl>
 * @copyright 2017-2020 Michael Dekker
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Firstred\PostNL\Entity;

use Firstred\PostNL\Exception\InvalidArgumentException;

/**
 * Class Dimension.
 */
interface DimensionInterface extends EntityInterface
{
    /**
     * Get height.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     * @see   Dimension::$height
     */
    public function getHeight(): ?string;

    /**
     * Set height.
     *
     * @pattern ^\d{1,20}$
     *
     * @param string|int|float|null $height
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example 1400
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     * @see     Dimension::$height
     */
    public function setHeight($height): DimensionInterface;

    /**
     * Get length.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     * @see   Dimension::$length
     */
    public function getLength(): ?string;

    /**
     * Set length.
     *
     * @pattern ^\d{1,20}$
     *
     * @param string|float|int|null $length
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example 2000
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     * @see     Dimension::$length
     */
    public function setLength($length): DimensionInterface;

    /**
     * Get weight.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     * @see   Dimension::$weight
     */
    public function getWeight(): ?string;

    /**
     * Set weight.
     *
     * @pattern ^\d{1,20}$
     *
     * @param string|float|int|null $weight
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example 4300
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     * @see     Dimension::$weight
     */
    public function setWeight($weight): DimensionInterface;

    /**
     * Get weight.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     * @see   Dimension::$width
     */
    public function getWidth(): ?string;

    /**
     * Get width.
     *
     * @pattern ^\d{1,20}$
     *
     * @param string|int|float|null $width
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example 1500
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     * @see     Dimension::$width
     */
    public function setWidth($width): DimensionInterface;

    /**
     * Get volume.
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     * @see   Dimension::$volume
     */
    public function getVolume(): ?string;

    /**
     * Set volume.
     *
     * @pattern ^\d{1,20}$
     *
     * @param string|null $volume
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example 30000
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     * @see     Dimension::$volume
     */
    public function setVolume($volume): DimensionInterface;
}