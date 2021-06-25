<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Helpers\SimpleImage;
use App\Entities\ShopImage;
use App\Repositories\ShopImageRepository;

class ShopImagesAnalyzator
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var ShopImageRepository
     */
    private $ShopImageRepository;

    public function __construct(
        LoggerInterface $logger,
        ShopImageRepository $ShopImageRepository

    ) {
        $this->logger = $logger;
        $this->ShopImageRepository = $ShopImageRepository;
    }

    public function run()
    {
        $this->logger->info("Анализируем картинки...");
        /**
         * @var $ShopImage ShopImage[]
         */
        $ShopImage = $this->ShopImageRepository->findAllNew();
        $this->logger->info("Всего новых картинок: " . count($ShopImage));

        foreach ($ShopImage as $shopImage) {
            $im = $this->getSimpleImage($shopImage->getImgTut());

            if (!$im) {
                $this->setStatusImgError($shopImage);
            }
            $im->square(100);
            $this->prepareShades($im, $shopImage);
            $im->square(4);

            list($rSum, $gSum, $bSum) = $this->formRgbSum($im, $shopImage);
            list($rSr, $gSr, $bSr) = $this->formRgbSr($rSum, $gSum, $bSum);

            $this->formKRgbMix($rSr, $gSr, $bSr, $shopImage);
            $shopImage->setKGrey($this->formKGrey($rSr, $gSr, $bSr));
            $this->ShopImageRepository->update();
        }
        $this->logger->info("Картинки проанализированы.");
    }

    /**
     * @param SimpleImage $im
     * @param array $ins
     * @return array
     */
    private function prepareShades(SimpleImage $im, ShopImage $shopImage)
    {
        $summi = [];
        for ($y = 0; $y < 100; $y++) {
            for ($x = 0; $x < 100; $x++) {
                $rgb = $im->rgb($x, $y);
                $r = (($rgb >> 16) & 0xFF) >> 6;
                $g = (($rgb >> 8) & 0xFF) >> 6;
                $b = ($rgb & 0xFF) >> 6;
                $color = ($r << 4) + ($g << 2) + $b;
                $summi[$color]++;
            }
        }
        $koef = 100 * 100 / 255;
        foreach ($summi as $color => $sum) {
            $sumNew = round($sum / $koef, 0);
            $summi[$color] = ($sumNew > 255) ? 255 : $sumNew;
        }

        for ($ott = 0; $ott < 64; $ott++) {
            $ottenokVarName = "setOtt{$ott}";
            if (isset($summi[$ott])) {
                $shopImage->$ottenokVarName($summi[$ott]);
            } else {
                $shopImage->$ottenokVarName(0);
            }
        }
    }

    /**
     * @param $img
     * @return SimpleImage
     */
    private function getSimpleImage($img): SimpleImage
    {
        return new SimpleImage(
            iconv(
                'UTF-8',
                'CP1251',
                getenv('SHOP_IMAGE_DIR') . '/' . $img
            )
        );
    }

    /**
     * @param ShopImage $shopImage
     */
    private function setStatusImgError(ShopImage $shopImage): void
    {
        $shopImage->setDop('type_error');
        $this->ShopImageRepository->update();
        $this->logger->info("type_error img={$shopImage->getImgTut()}");
    }

    /**
     * @param array $ins
     * @param float $r_sr
     * @param float $g_sr
     * @param float $b_sr
     * @return array
     */
    private function formKRgbMix(float $r_sr, float $g_sr, float $b_sr, ShopImage $shopImage)
    {
        $shopImage->setKRgbMix(0);
        for ($i = 7; $i >= 0; $i--) {
            $r_bit = (($r_sr >> $i) & 1);
            $g_bit = (($g_sr >> $i) & 1);
            $b_bit = (($b_sr >> $i) & 1);

            $shopImage->setKRgbMix(($shopImage->getKRgbMix() << 1) + $r_bit);
            $shopImage->setKRgbMix(($shopImage->getKRgbMix() << 1) + $g_bit);
            $shopImage->setKRgbMix(($shopImage->getKRgbMix() << 1) + $b_bit);
        }
    }

    /**
     * @param float $r_sr
     * @param float $g_sr
     * @param float $b_sr
     * @return float
     */
    private function formKGrey(float $r_sr, float $g_sr, float $b_sr): float
    {
        return round(($r_sr + $g_sr + $b_sr) / 3, 0);
    }

    /**
     * @param int $rSum
     * @param int $gSum
     * @param int $bSum
     * @return array
     */
    private function formRgbSr(int $rSum, int $gSum, int $bSum): array
    {
        $rSr = round($rSum / 16, 0);
        $gSr = round($gSum / 16, 0);
        $bSr = round($bSum / 16, 0);
        return array($rSr, $gSr, $bSr);
    }

    /**
     * @param SimpleImage $im
     * @param array $ins
     * @return array
     */
    private function formRgbSum(SimpleImage $im, ShopImage $shopImage): array
    {
        $k = 1;
        $rSum = 0;
        $gSum = 0;
        $bSum = 0;
        for ($y = 0; $y < 4; $y++) {
            for ($x = 0; $x < 4; $x++) {
                $rgb = $im->rgb($x, $y);
                $shopImage->{"setK1$k"}(($rgb >> 16) & 0xFF);
                $rSum += $shopImage->{"getK1$k"}();
                $shopImage->{"setK2$k"}(($rgb >> 8) & 0xFF);
                $gSum += $shopImage->{"getK2$k"}();
                $shopImage->{"setK3$k"}($rgb & 0xFF);
                $bSum += $shopImage->{"getK3$k"}();
                $k++;
            }
        }
        return [$rSum, $gSum, $bSum];
    }

}
