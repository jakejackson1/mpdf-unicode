<?php

namespace Mpdf\Fonts\Unicode\Language;

use Mpdf\Language\LanguageToFontInterface;

class LanguageToFont implements LanguageToFontInterface
{

    public function getLanguageOptions($llcc, $adobeCJK)
    {
        $tags    = explode('-', $llcc);
        $lang    = strtolower($tags[0]);
        $country = '';
        $script  = '';
        if ( ! empty($tags[1])) {
            if (strlen($tags[1]) === 4) {
                $script = strtolower($tags[1]);
            } else {
                $country = strtolower($tags[1]);
            }
        }
        if ( ! empty($tags[2])) {
            $country = strtolower($tags[2]);
        }

        $unifont = '';

        switch ($lang) {
            case 'ru':
            case 'rus': // Russian	// CYRILLIC
            case 'ab':
            case 'abk': // Abkhaz
            case 'av':
            case 'ava': // Avaric
            case 'ba':
            case 'bak': // Bashkir
            case 'be':
            case 'bel': // Belarusian
            case 'bg':
            case 'bul': // Bulgarian
            case 'ce':
            case 'che': // Chechen
            case 'cv':
            case 'chv': // Chuvash
            case 'kk':
            case 'kaz': // Kazakh
            case 'kv':
            case 'kom': // Komi
            case 'ky':
            case 'kir': // Kyrgyz
            case 'mk':
            case 'mkd': // Macedonian
            case 'cu':
            case 'chu': // Old Church Slavonic
            case 'os':
            case 'oss': // Ossetian
            case 'sr':
            case 'srp': // Serbian
            case 'tg':
            case 'tgk': // Tajik
            case 'tt':
            case 'tat': // Tatar
            case 'tk':
            case 'tuk': // Turkmen
            case 'uk':
            case 'ukr': // Ukrainian
                $unifont = 'dejavusanscondensed'; /* freeserif best coverage for supplements etc. */
            break;

            case 'hy':
            case 'hye': // ARMENIAN
                $unifont = 'dejavusans';
            break;
            case 'ka':
            case 'kat': // GEORGIAN
                $unifont = 'dejavusans';
            break;

            case 'el':
            case 'ell': // GREEK
                $unifont = 'dejavusanscondensed';
            break;

            case 'got':  // GOTHIC
                $unifont = 'freeserif';
            break;

            /* African */
            case 'nqo':  // NKO
                $unifont = 'dejavusans';
            break;
            //CASE 'bax':	// BAMUM
            //CASE 'ha':  CASE 'hau':	// Hausa
            case 'vai':  // VAI
                $unifont = 'freesans';
            break;

            /* South Asian */
            case 'as':
            case 'asm': // Assamese
                $unifont = 'freeserif';
            break;
            case 'bn':
            case 'ben': // BENGALI; Bangla
                $unifont = 'freeserif';
            break;
            case 'ks':
            case 'kas': // Kashmiri
                $unifont = 'freeserif';
            break;
            case 'hi':
            case 'hin': // Hindi	DEVANAGARI
            case 'bh':
            case 'bih': // Bihari (Bhojpuri, Magahi, and Maithili)
            case 'sa':
            case 'san': // Sanskrit
                $unifont = 'freeserif';
            break;
            case 'gu':
            case 'guj': // Gujarati
                $unifont = 'freeserif';
            break;
            case 'pa':
            case 'pan': // Panjabi, Punjabi GURMUKHI
                $unifont = 'freeserif';
            break;
            case 'mr':
            case 'mar': // Marathi
                $unifont = 'freeserif';
            break;
            case 'ml':
            case 'mal': // MALAYALAM
                $unifont = 'freeserif';
            break;
            case 'ne':
            case 'nep': // Nepali
                $unifont = 'freeserif';
            break;
            case 'or':
            case 'ori': // ORIYA
                $unifont = 'freeserif';
            break;
            case 'ta':
            case 'tam': // TAMIL
                $unifont = 'freeserif';
            break;

            // Sindhi (Arabic or Devanagari)
            case 'sd':
            case 'snd': // Sindhi
                if ($country === 'in') {
                    $unifont = 'freeserif';
                }
            break;

            case 'dv':
            case 'div': // Divehi; Maldivian  THAANA
                $unifont = 'freeserif';
            break;

            // VIETNAMESE
            case 'vi':
            case 'vie': // Vietnamese
                $unifont = 'dejavusanscondensed';
            break;

            //CASE 'ms':  CASE 'msa':	// Malay
            //CASE 'ban':	// BALINESE
            //CASE 'bya':	// BATAK
            case 'bug':  // BUGINESE
                $unifont = 'freeserif';
            break;

            /* Undetermined language - script used */
            case 'und':
                $unifont = $this->fontByScript($script);
            break;
        }

        return $unifont;
    }

    protected function fontByScript($script)
    {
        switch ($script) {
            /* European */
            case 'latn': // LATIN
                return 'dejavusanscondensed';
            case 'cyrl': // CYRILLIC
                return 'dejavusanscondensed';
            case 'ogam': // OGHAM
                return 'dejavusans';

            /* African */
            case 'tfng': // TIFINAGH
                return 'dejavusans';

            /* South East Asian */
            case 'kali': // KAYAH_LI
                return 'freemono';

            /* Other */
            case 'brai': // BRAILLE
                return 'dejavusans';
        }

        return '';
    }

}
