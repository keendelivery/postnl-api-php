<?php
declare(strict_types=1);
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2017-2019 Michael Dekker (https://github.com/firstred)
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
 *
 * @copyright 2017-2019 Michael Dekker
 *
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Firstred\PostNL\Entity;

use Firstred\PostNL\Exception\InvalidArgumentException;
use Firstred\PostNL\Misc\ValidateAndFix;

/**
 * Class Customs
 */
class Customs extends AbstractEntity
{
    /**
     * Certificate
     *
     * Mandatory for Commercial Goods, Commercial Sample and Returned Goods (or Invoice or License; at least 1 out of 3 must be selected)
     *
     * @pattern N/A
     *
     * @example N/A
     *
     * @var bool|null $certificate
     *
     * @since 1.0.0
     */
    protected $certificate;

    /**
     * Certificate number
     *
     * Mandatory when Certificate is true.
     *
     * @pattern ^.{0,35}$
     *
     * @example NR112233
     *
     * @var string|null $certificateNr
     *
     * @since 1.0.0
     */
    protected $certificateNr;

    /**
     * Content
     *
     * @pattern N/A
     *
     * @example N/A
     *
     * @var Content[]|null $content
     *
     * @since 1.0.0
     */
    protected $content;

    /**
     * Currency
     *
     * @pattern ^[A-Z]{3}$
     *
     * @example EUR
     *
     * @var string|null $currency
     *
     * @since 1.0.0
     */
    protected $currency;

    /**
     * EAN
     *
     * @pattern ^[0-9]{8}(?:[0-9]{5})?$
     *
     * @example 7501031311309
     *
     * @var string|null EAN
     *
     * @since 1.0.0
     */
    protected $EAN;

    /**
     * Handle as non-deliverable
     *
     * Determines what to do when the shipment cannot be delivered the first time (if this is set to true, the shipment will be returned after the first failed attempt)
     *
     * @pattern N/A
     *
     * @example N/A
     *
     * @var bool|null $handleAsNonDeliverable
     *
     * @since 1.0.0
     */
    protected $handleAsNonDeliverable;

    /**
     * Indicates whether the shipment has an invoice
     *
     * Possible values are true/false (no capitals allowed)
     * Mandatory for Commercial Goods, Commercial Sample and Returned Goods (or Certificate or License; at least 1 out of 3 must be selected
     *
     * @pattern N/A
     *
     * @example N/A
     *
     * @var bool|null $invoice
     *
     * @since 1.0.0
     */
    protected $invoice;

    /**
     * Invoice number
     *
     * @pattern ^.{0,35}$
     *
     * @example 22334455
     *
     * @var string|null $invoiceNr
     *
     * @since 1.0.0
     */
    protected $invoiceNr;

    /**
     * Indicates whether the shipment has a license
     *
     * Mandatory for Commercial Goods, Commercial Sample and Returned Goods (or Certificate or Certificate; at least 1 out of 3 must be selected)
     *
     * @pattern N/A
     *
     * @example N/A
     *
     * @var string|null $license
     *
     * @since 1.0.0
     */
    protected $license;

    /**
     * License number
     *
     * Mandatory when License is true
     *
     * @pattern ^.{0,35}$
     *
     * @example 11223344
     *
     * @var string|null $licenseNr
     *
     * @since 1.0.0
     */
    protected $licenseNr;

    /**
     * Shipment type
     *
     * Type of shipment, possible values: Gift, Documents, Commercial Goods, Commercial Sample, Returned Goods
     *
     * @pattern ^(?:Gift|Documents|Commercial Goods|Commercial Sample|Returned Goods)$
     *
     * @example Documents
     *
     * @var string|null $shipmentType
     *
     * @since 1.0.0
     */
    protected $shipmentType;

    /**
     * Trusted shipper ID
     *
     * @pattern ^.{0,50}$
     *
     * @example 1234
     *
     * @var string|null $trustedShipperID
     *
     * @since 1.0.0
     */
    protected $trustedShipperID;

    /**
     * Importer reference code
     *
     * @pattern ^.{0,50}$
     *
     * @example 567
     *
     * @var string|null $importerReferenceCode
     *
     * @since 1.0.0
     */
    protected $importerReferenceCode;

    /**
     * Transaction code
     *
     * Mandatory for shipments to the USA. See list 136 on [this](https://support.ptc.post/scms_public/) page (only use the free usage codes).
     *
     * @pattern ^.{0,50}$
     *
     * @example 100
     *
     * @var string|null $transactionCode
     *
     * @since 1.0.0
     */
    protected $transactionCode;

    /**
     * Transaction description
     *
     * Transaction description
     * Mandatory for shipments to the USA
     *
     * @pattern ^.{0,50}$
     *
     * @example Milk Powder
     *
     * @var string|null $transactionDescription
     *
     * @since 1.0.0
     */
    protected $transactionDescription;

    /**
     * Customs constructor.
     *
     * @param bool|null      $certificate
     * @param string|null    $certificateNr
     * @param Content[]|null $content
     * @param string|null    $currency
     * @param string|null    $ean
     * @param bool|null      $handleAsNonDeliverable
     * @param bool|null      $invoice
     * @param string|null    $invoiceNr
     * @param bool|null      $license
     * @param string|null    $licenseNr
     * @param string|null    $shipmentType
     * @param string|null    $trustedShipperId
     * @param string|null    $importerReferenceCode
     * @param string|null    $transactionCode
     * @param string|null    $transactionDescription
     *
     * @throws InvalidArgumentException
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     */
    public function __construct(?bool $certificate = null, ?string $certificateNr = null, ?array $content = null, ?string $currency = null, ?string $ean = null, ?bool $handleAsNonDeliverable = null, ?bool $invoice = null, ?string $invoiceNr = null, ?bool $license = null, ?string $licenseNr = null, ?string $shipmentType = null, ?string $trustedShipperId = null, ?string $importerReferenceCode = null, ?string $transactionCode = null, ?string $transactionDescription = null)
    {
        parent::__construct();

        $this->setCertificate($certificate);
        $this->setCertificateNr($certificateNr);
        $this->setContent($content);
        $this->setCurrency($currency);
        $this->setEAN($ean);
        $this->setHandleAsNonDeliverable($handleAsNonDeliverable);
        $this->setInvoice($invoice);
        $this->setInvoiceNr($invoiceNr);
        $this->setLicense($license);
        $this->setLicenseNr($licenseNr);
        $this->setShipmentType($shipmentType);
        $this->setTrustedShipperID($trustedShipperId);
        $this->setImporterReferenceCode($importerReferenceCode);
        $this->setTransactionCode($transactionCode);
        $this->setTransactionDescription($transactionDescription);
    }

    /**
     * Get certificate
     *
     * @return bool|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$certificate
     */
    public function getCertificate(): ?bool
    {
        return $this->certificate;
    }

    /**
     * Set certificate
     *
     * @pattern N/A
     *
     * @param bool|null $certificate
     *
     * @return static
     *
     * @example N/A
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$certificate
     */
    public function setCertificate(?bool $certificate): Customs
    {
        $this->certificate = $certificate;

        return $this;
    }

    /**
     * Get certificate number
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$certificateNr
     */
    public function getCertificateNr(): ?string
    {
        return $this->certificateNr;
    }

    /**
     * Set certificate number
     *
     * @pattern ^.{0,35}$
     *
     * @param string|null $certificateNr
     *
     * @return static
     *
     * @example NR112233
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$certificateNr
     */
    public function setCertificateNr(?string $certificateNr): Customs
    {
        $this->certificateNr = $certificateNr;

        return $this;
    }

    /**
     * Get content
     *
     * @return Content[]|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$content
     */
    public function getContent(): ?array
    {
        return $this->content;
    }

    /**
     * Set content
     *
     * @pattern N/A
     *
     * @param Content[]|null $content
     *
     * @return static
     *
     * @example N/A
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$content
     */
    public function setContent(?array $content): Customs
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$currency
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Set currency
     *
     * @pattern ^[A-Z]{3}$
     *
     * @param string|null $currency
     *
     * @return static
     *
     * @example EUR
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$currency
     */
    public function setCurrency(?string $currency): Customs
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get EAN
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$EANa
     */
    public function getEAN(): ?string
    {
        return $this->EAN;
    }

    /**
     * Set EAN
     *
     * @pattern ^[0-9]{8}(?:[0-9]{5})?$
     *
     * @param string|null $EAN
     *
     * @return static
     *
     * @example 7501031311309
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$EAN
     */
    public function setEAN(?string $EAN): Customs
    {
        $this->EAN = $EAN;

        return $this;
    }

    /**
     * Get handle as non-deliverable
     *
     * @return bool|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$handleAsNonDeliverable
     */
    public function getHandleAsNonDeliverable(): ?bool
    {
        return $this->handleAsNonDeliverable;
    }

    /**
     * Set handle as non-deliverable
     *
     * @pattern N/A
     *
     * @param bool|null $handleAsNonDeliverable
     *
     * @return static
     *
     * @example N/A
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$handleAsNonDeliverable
     */
    public function setHandleAsNonDeliverable(?bool $handleAsNonDeliverable): Customs
    {
        $this->handleAsNonDeliverable = $handleAsNonDeliverable;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return bool|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$invoice
     */
    public function getInvoice(): ?bool
    {
        return $this->invoice;
    }

    /**
     * Set invoice
     *
     * @pattern N/A
     *
     * @param bool|null $invoice
     *
     * @return static
     *
     * @example N/A
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$invoice
     */
    public function setInvoice(?bool $invoice): Customs
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice number
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$invoiceNr
     */
    public function getInvoiceNr(): ?string
    {
        return $this->invoiceNr;
    }

    /**
     * Set invoice number
     *
     * @pattern ^.{0,35}$
     *
     * @param string|null $invoiceNr
     *
     * @return static
     *
     * @example 22334455
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$invoiceNr
     */
    public function setInvoiceNr(?string $invoiceNr): Customs
    {
        $this->invoiceNr = $invoiceNr;

        return $this;
    }

    /**
     * Get license
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$license
     */
    public function getLicense(): ?string
    {
        return $this->license;
    }

    /**
     * Set license
     *
     * @pattern N/A
     *
     * @param string|null $license
     *
     * @return static
     *
     * @example N/A
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$license
     */
    public function setLicense(?string $license): Customs
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$licenseNr
     */
    public function getLicenseNr(): ?string
    {
        return $this->licenseNr;
    }

    /**
     * Set license number
     *
     * @pattern ^.{0,35}$
     *
     * @param string|null $licenseNr
     *
     * @return static
     *
     * @example 11223344
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$licenseNr
     */
    public function setLicenseNr(?string $licenseNr): Customs
    {
        $this->licenseNr = $licenseNr;

        return $this;
    }

    /**
     * Get shipment type
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$shipmentType
     */
    public function getShipmentType(): ?string
    {
        return $this->shipmentType;
    }

    /**
     * Set shipment type
     *
     * @pattern ^(?:Gift|Documents|Commercial Goods|Commercial Sample|Returned Goods)$
     *
     * @param string|null $shipmentType
     *
     * @return static
     *
     * @example Documents
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$shipmentType
     */
    public function setShipmentType(?string $shipmentType): Customs
    {
        $this->shipmentType = $shipmentType;

        return $this;
    }

    /**
     * Get Trusted Shipper ID
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$trustedShipperID
     */
    public function getTrustedShipperID(): ?string
    {
        return $this->trustedShipperID;
    }

    /**
     * Set Trusted Shipper ID
     *
     * @pattern ^.{0,50}$
     *
     * @param string|null $trustedShipperID
     *
     * @return static
     *
     * @example 1234
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see     Customs::$trustedShipperID
     */
    public function setTrustedShipperID(?string $trustedShipperID): Customs
    {
        $this->trustedShipperID = $trustedShipperID;

        return $this;
    }

    /**
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$importerReferenceCode
     */
    public function getImporterReferenceCode(): ?string
    {
        return $this->importerReferenceCode;
    }

    /**
     * Set importer reference code
     *
     * @pattern ^.{0,50}$
     *
     * @param string|null $importerReferenceCode
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     *
     * @see     Customs::$importerReferenceCode
     *
     * @example 567
     */
    public function setImporterReferenceCode(?string $importerReferenceCode): Customs
    {
        $this->importerReferenceCode = ValidateAndFix::genericString($importerReferenceCode, 50);

        return $this;
    }

    /**
     * Get transaction code
     *
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$transactionCode
     *
     * @see   Customs::$transactionCode
     */
    public function getTransactionCode(): ?string
    {
        return $this->transactionCode;
    }

    /**
     * Set transaction code
     *
     * @pattern ^.{0,50}$
     *
     * @param string|null $transactionCode
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     *
     * @see     Customs::$transactionCode
     *
     * @example 100
     */
    public function setTransactionCode(?string $transactionCode): Customs
    {
        $this->transactionCode = ValidateAndFix::genericString($transactionCode, 50);

        return $this;
    }

    /**
     * @return string|null
     *
     * @since 1.0.0
     * @since 2.0.0 Strict typing
     *
     * @see   Customs::$transactionDescription
     */
    public function getTransactionDescription(): ?string
    {
        return $this->transactionDescription;
    }

    /**
     * Set transaction description
     *
     * @pattern ^.{0,50}$
     *
     * @param string|null $transactionDescription
     *
     * @return static
     *
     * @throws InvalidArgumentException
     *
     * @example Milk Powder
     *
     * @since   1.0.0
     * @since   2.0.0 Strict typing
     *
     * @see     Customs::$transactionDescription
     */
    public function setTransactionDescription(?string $transactionDescription): Customs
    {
        $this->transactionDescription = ValidateAndFix::genericString($transactionDescription, 50);

        return $this;
    }
}
