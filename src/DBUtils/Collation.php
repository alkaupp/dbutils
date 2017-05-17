<?php namespace AKUtils\DBUtils;

class Collation
{
    const BIG5_CHINESE_CI = "big5_chinese_ci";
    const BIG5_BIN = "big5_bin";
    const DEC8_SWEDISH_CI = "dec8_swedish_ci";
    const DEC8_BIN = "dec8_bin";
    const CP850_GENERAL_CI = "cp850_general_ci";
    const CP850_BIN = "cp850_bin";
    const HP8_ENGLISH_CI = "hp8_english_ci";
    const HP8_BIN = "hp8_bin";
    const KOI8R_GENERAL_CI = "koi8r_general_ci";
    const KOI8R_BIN = "koi8r_bin";
    const LATIN1_GERMAN1_CI = "latin1_german1_ci";
    const LATIN1_SWEDISH_CI = "latin1_swedish_ci";
    const LATIN1_DANISH_CI = "latin1_danish_ci";
    const LATIN1_GERMAN2_CI = "latin1_german2_ci";
    const LATIN1_BIN = "latin1_bin";
    const LATIN1_GENERAL_CI = "latin1_general_ci";
    const LATIN1_GENERAL_CS = "latin1_general_cs";
    const LATIN1_SPANISH_CI = "latin1_spanish_ci";
    const LATIN2_CZECH_CS = "latin2_czech_cs";
    const LATIN2_GENERAL_CI = "latin2_general_ci";
    const LATIN2_HUNGARIAN_CI = "latin2_hungarian_ci";
    const LATIN2_CROATIAN_CI = "latin2_croatian_ci";
    const LATIN2_BIN = "latin2_bin";
    const SWE7_SWEDISH_CI = "swe7_swedish_ci";
    const SWE7_BIN = "swe7_bin";
    const ASCII_GENERAL_CI = "ascii_general_ci";
    const ASCII_BIN = "ascii_bin";
    const UJIS_JAPANESE_CI = "ujis_japanese_ci";
    const UJIS_BIN = "ujis_bin";
    const SJIS_JAPANESE_CI = "sjis_japanese_ci";
    const SJIS_BIN = "sjis_bin";
    const HEBREW_GENERAL_CI = "hebrew_general_ci";
    const HEBREW_BIN = "hebrew_bin";
    const TIS620_THAI_CI = "tis620_thai_ci";
    const TIS620_BIN = "tis620_bin";
    const EUCKR_KOREAN_CI = "euckr_korean_ci";
    const EUCKR_BIN = "euckr_bin";
    const KOI8U_GENERAL_CI = "koi8u_general_ci";
    const KOI8U_BIN = "koi8u_bin";
    const GB2312_CHINESE_CI = "gb2312_chinese_ci";
    const GB2312_BIN = "gb2312_bin";
    const GREEK_GENERAL_CI = "greek_general_ci";
    const GREEK_BIN = "greek_bin";
    const CP1250_GENERAL_CI = "cp1250_general_ci";
    const CP1250_CZECH_CS = "cp1250_czech_cs";
    const CP1250_CROATIAN_CI = "cp1250_croatian_ci";
    const CP1250_BIN = "cp1250_bin";
    const CP1250_POLISH_CI = "cp1250_polish_ci";
    const GBK_CHINESE_CI = "gbk_chinese_ci";
    const GBK_BIN = "gbk_bin";
    const LATIN5_TURKISH_CI = "latin5_turkish_ci";
    const LATIN5_BIN = "latin5_bin";
    const ARMSCII8_GENERAL_CI = "armscii8_general_ci";
    const ARMSCII8_BIN = "armscii8_bin";
    const UTF8_GENERAL_CI = "utf8_general_ci";
    const UTF8_BIN = "utf8_bin";
    const UTF8_UNICODE_CI = "utf8_unicode_ci";
    const UTF8_ICELANDIC_CI = "utf8_icelandic_ci";
    const UTF8_LATVIAN_CI = "utf8_latvian_ci";
    const UTF8_ROMANIAN_CI = "utf8_romanian_ci";
    const UTF8_SLOVENIAN_CI = "utf8_slovenian_ci";
    const UTF8_POLISH_CI = "utf8_polish_ci";
    const UTF8_ESTONIAN_CI = "utf8_estonian_ci";
    const UTF8_SPANISH_CI = "utf8_spanish_ci";
    const UTF8_SWEDISH_CI = "utf8_swedish_ci";
    const UTF8_TURKISH_CI = "utf8_turkish_ci";
    const UTF8_CZECH_CI = "utf8_czech_ci";
    const UTF8_DANISH_CI = "utf8_danish_ci";
    const UTF8_LITHUANIAN_CI = "utf8_lithuanian_ci";
    const UTF8_SLOVAK_CI = "utf8_slovak_ci";
    const UTF8_SPANISH2_CI = "utf8_spanish2_ci";
    const UTF8_ROMAN_CI = "utf8_roman_ci";
    const UTF8_PERSIAN_CI = "utf8_persian_ci";
    const UTF8_ESPERANTO_CI = "utf8_esperanto_ci";
    const UTF8_HUNGARIAN_CI = "utf8_hungarian_ci";
    const UTF8_SINHALA_CI = "utf8_sinhala_ci";
    const UTF8_GERMAN2_CI = "utf8_german2_ci";
    const UTF8_CROATIAN_MYSQL561_CI = "utf8_croatian_mysql561_ci";
    const UTF8_UNICODE_520_CI = "utf8_unicode_520_ci";
    const UTF8_VIETNAMESE_CI = "utf8_vietnamese_ci";
    const UTF8_GENERAL_MYSQL500_CI = "utf8_general_mysql500_ci";
    const UTF8_CROATIAN_CI = "utf8_croatian_ci";
    const UTF8_MYANMAR_CI = "utf8_myanmar_ci";
    const UTF8_THAI_520_W2 = "utf8_thai_520_w2";
    const UCS2_GENERAL_CI = "ucs2_general_ci";
    const UCS2_BIN = "ucs2_bin";
    const UCS2_UNICODE_CI = "ucs2_unicode_ci";
    const UCS2_ICELANDIC_CI = "ucs2_icelandic_ci";
    const UCS2_LATVIAN_CI = "ucs2_latvian_ci";
    const UCS2_ROMANIAN_CI = "ucs2_romanian_ci";
    const UCS2_SLOVENIAN_CI = "ucs2_slovenian_ci";
    const UCS2_POLISH_CI = "ucs2_polish_ci";
    const UCS2_ESTONIAN_CI = "ucs2_estonian_ci";
    const UCS2_SPANISH_CI = "ucs2_spanish_ci";
    const UCS2_SWEDISH_CI = "ucs2_swedish_ci";
    const UCS2_TURKISH_CI = "ucs2_turkish_ci";
    const UCS2_CZECH_CI = "ucs2_czech_ci";
    const UCS2_DANISH_CI = "ucs2_danish_ci";
    const UCS2_LITHUANIAN_CI = "ucs2_lithuanian_ci";
    const UCS2_SLOVAK_CI = "ucs2_slovak_ci";
    const UCS2_SPANISH2_CI = "ucs2_spanish2_ci";
    const UCS2_ROMAN_CI = "ucs2_roman_ci";
    const UCS2_PERSIAN_CI = "ucs2_persian_ci";
    const UCS2_ESPERANTO_CI = "ucs2_esperanto_ci";
    const UCS2_HUNGARIAN_CI = "ucs2_hungarian_ci";
    const UCS2_SINHALA_CI = "ucs2_sinhala_ci";
    const UCS2_GERMAN2_CI = "ucs2_german2_ci";
    const UCS2_CROATIAN_MYSQL561_CI = "ucs2_croatian_mysql561_ci";
    const UCS2_UNICODE_520_CI = "ucs2_unicode_520_ci";
    const UCS2_VIETNAMESE_CI = "ucs2_vietnamese_ci";
    const UCS2_GENERAL_MYSQL500_CI = "ucs2_general_mysql500_ci";
    const UCS2_CROATIAN_CI = "ucs2_croatian_ci";
    const UCS2_MYANMAR_CI = "ucs2_myanmar_ci";
    const UCS2_THAI_520_W2 = "ucs2_thai_520_w2";
    const CP866_GENERAL_CI = "cp866_general_ci";
    const CP866_BIN = "cp866_bin";
    const KEYBCS2_GENERAL_CI = "keybcs2_general_ci";
    const KEYBCS2_BIN = "keybcs2_bin";
    const MACCE_GENERAL_CI = "macce_general_ci";
    const MACCE_BIN = "macce_bin";
    const MACROMAN_GENERAL_CI = "macroman_general_ci";
    const MACROMAN_BIN = "macroman_bin";
    const CP852_GENERAL_CI = "cp852_general_ci";
    const CP852_BIN = "cp852_bin";
    const LATIN7_ESTONIAN_CS = "latin7_estonian_cs";
    const LATIN7_GENERAL_CI = "latin7_general_ci";
    const LATIN7_GENERAL_CS = "latin7_general_cs";
    const LATIN7_BIN = "latin7_bin";
    const UTF8MB4_GENERAL_CI = "utf8mb4_general_ci";
    const UTF8MB4_BIN = "utf8mb4_bin";
    const UTF8MB4_UNICODE_CI = "utf8mb4_unicode_ci";
    const UTF8MB4_ICELANDIC_CI = "utf8mb4_icelandic_ci";
    const UTF8MB4_LATVIAN_CI = "utf8mb4_latvian_ci";
    const UTF8MB4_ROMANIAN_CI = "utf8mb4_romanian_ci";
    const UTF8MB4_SLOVENIAN_CI = "utf8mb4_slovenian_ci";
    const UTF8MB4_POLISH_CI = "utf8mb4_polish_ci";
    const UTF8MB4_ESTONIAN_CI = "utf8mb4_estonian_ci";
    const UTF8MB4_SPANISH_CI = "utf8mb4_spanish_ci";
    const UTF8MB4_SWEDISH_CI = "utf8mb4_swedish_ci";
    const UTF8MB4_TURKISH_CI = "utf8mb4_turkish_ci";
    const UTF8MB4_CZECH_CI = "utf8mb4_czech_ci";
    const UTF8MB4_DANISH_CI = "utf8mb4_danish_ci";
    const UTF8MB4_LITHUANIAN_CI = "utf8mb4_lithuanian_ci";
    const UTF8MB4_SLOVAK_CI = "utf8mb4_slovak_ci";
    const UTF8MB4_SPANISH2_CI = "utf8mb4_spanish2_ci";
    const UTF8MB4_ROMAN_CI = "utf8mb4_roman_ci";
    const UTF8MB4_PERSIAN_CI = "utf8mb4_persian_ci";
    const UTF8MB4_ESPERANTO_CI = "utf8mb4_esperanto_ci";
    const UTF8MB4_HUNGARIAN_CI = "utf8mb4_hungarian_ci";
    const UTF8MB4_SINHALA_CI = "utf8mb4_sinhala_ci";
    const UTF8MB4_GERMAN2_CI = "utf8mb4_german2_ci";
    const UTF8MB4_CROATIAN_MYSQL561_CI = "utf8mb4_croatian_mysql561_ci";
    const UTF8MB4_UNICODE_520_CI = "utf8mb4_unicode_520_ci";
    const UTF8MB4_VIETNAMESE_CI = "utf8mb4_vietnamese_ci";
    const UTF8MB4_CROATIAN_CI = "utf8mb4_croatian_ci";
    const UTF8MB4_MYANMAR_CI = "utf8mb4_myanmar_ci";
    const UTF8MB4_THAI_520_W2 = "utf8mb4_thai_520_w2";
    const CP1251_BULGARIAN_CI = "cp1251_bulgarian_ci";
    const CP1251_UKRAINIAN_CI = "cp1251_ukrainian_ci";
    const CP1251_BIN = "cp1251_bin";
    const CP1251_GENERAL_CI = "cp1251_general_ci";
    const CP1251_GENERAL_CS = "cp1251_general_cs";
    const UTF16_GENERAL_CI = "utf16_general_ci";
    const UTF16_BIN = "utf16_bin";
    const UTF16_UNICODE_CI = "utf16_unicode_ci";
    const UTF16_ICELANDIC_CI = "utf16_icelandic_ci";
    const UTF16_LATVIAN_CI = "utf16_latvian_ci";
    const UTF16_ROMANIAN_CI = "utf16_romanian_ci";
    const UTF16_SLOVENIAN_CI = "utf16_slovenian_ci";
    const UTF16_POLISH_CI = "utf16_polish_ci";
    const UTF16_ESTONIAN_CI = "utf16_estonian_ci";
    const UTF16_SPANISH_CI = "utf16_spanish_ci";
    const UTF16_SWEDISH_CI = "utf16_swedish_ci";
    const UTF16_TURKISH_CI = "utf16_turkish_ci";
    const UTF16_CZECH_CI = "utf16_czech_ci";
    const UTF16_DANISH_CI = "utf16_danish_ci";
    const UTF16_LITHUANIAN_CI = "utf16_lithuanian_ci";
    const UTF16_SLOVAK_CI = "utf16_slovak_ci";
    const UTF16_SPANISH2_CI = "utf16_spanish2_ci";
    const UTF16_ROMAN_CI = "utf16_roman_ci";
    const UTF16_PERSIAN_CI = "utf16_persian_ci";
    const UTF16_ESPERANTO_CI = "utf16_esperanto_ci";
    const UTF16_HUNGARIAN_CI = "utf16_hungarian_ci";
    const UTF16_SINHALA_CI = "utf16_sinhala_ci";
    const UTF16_GERMAN2_CI = "utf16_german2_ci";
    const UTF16_CROATIAN_MYSQL561_CI = "utf16_croatian_mysql561_ci";
    const UTF16_UNICODE_520_CI = "utf16_unicode_520_ci";
    const UTF16_VIETNAMESE_CI = "utf16_vietnamese_ci";
    const UTF16_CROATIAN_CI = "utf16_croatian_ci";
    const UTF16_MYANMAR_CI = "utf16_myanmar_ci";
    const UTF16_THAI_520_W2 = "utf16_thai_520_w2";
    const UTF16LE_GENERAL_CI = "utf16le_general_ci";
    const UTF16LE_BIN = "utf16le_bin";
    const CP1256_GENERAL_CI = "cp1256_general_ci";
    const CP1256_BIN = "cp1256_bin";
    const CP1257_LITHUANIAN_CI = "cp1257_lithuanian_ci";
    const CP1257_BIN = "cp1257_bin";
    const CP1257_GENERAL_CI = "cp1257_general_ci";
    const UTF32_GENERAL_CI = "utf32_general_ci";
    const UTF32_BIN = "utf32_bin";
    const UTF32_UNICODE_CI = "utf32_unicode_ci";
    const UTF32_ICELANDIC_CI = "utf32_icelandic_ci";
    const UTF32_LATVIAN_CI = "utf32_latvian_ci";
    const UTF32_ROMANIAN_CI = "utf32_romanian_ci";
    const UTF32_SLOVENIAN_CI = "utf32_slovenian_ci";
    const UTF32_POLISH_CI = "utf32_polish_ci";
    const UTF32_ESTONIAN_CI = "utf32_estonian_ci";
    const UTF32_SPANISH_CI = "utf32_spanish_ci";
    const UTF32_SWEDISH_CI = "utf32_swedish_ci";
    const UTF32_TURKISH_CI = "utf32_turkish_ci";
    const UTF32_CZECH_CI = "utf32_czech_ci";
    const UTF32_DANISH_CI = "utf32_danish_ci";
    const UTF32_LITHUANIAN_CI = "utf32_lithuanian_ci";
    const UTF32_SLOVAK_CI = "utf32_slovak_ci";
    const UTF32_SPANISH2_CI = "utf32_spanish2_ci";
    const UTF32_ROMAN_CI = "utf32_roman_ci";
    const UTF32_PERSIAN_CI = "utf32_persian_ci";
    const UTF32_ESPERANTO_CI = "utf32_esperanto_ci";
    const UTF32_HUNGARIAN_CI = "utf32_hungarian_ci";
    const UTF32_SINHALA_CI = "utf32_sinhala_ci";
    const UTF32_GERMAN2_CI = "utf32_german2_ci";
    const UTF32_CROATIAN_MYSQL561_CI = "utf32_croatian_mysql561_ci";
    const UTF32_UNICODE_520_CI = "utf32_unicode_520_ci";
    const UTF32_VIETNAMESE_CI = "utf32_vietnamese_ci";
    const UTF32_CROATIAN_CI = "utf32_croatian_ci";
    const UTF32_MYANMAR_CI = "utf32_myanmar_ci";
    const UTF32_THAI_520_W2 = "utf32_thai_520_w2";
    const BINARY = "binary";
    const GEOSTD8_GENERAL_CI = "geostd8_general_ci";
    const GEOSTD8_BIN = "geostd8_bin";
    const CP932_JAPANESE_CI = "cp932_japanese_ci";
    const CP932_BIN = "cp932_bin";
    const EUCJPMS_JAPANESE_CI = "eucjpms_japanese_ci";
    const EUCJPMS_BIN = "eucjpms_bin";

    const LIST = [
        self::BIG5_CHINESE_CI, self::BIG5_BIN, self::DEC8_SWEDISH_CI,
        self::DEC8_BIN, self::CP850_GENERAL_CI, self::CP850_BIN,
        self::HP8_ENGLISH_CI, self::HP8_BIN, self::KOI8R_GENERAL_CI,
        self::KOI8R_BIN, self::LATIN1_GERMAN1_CI, self::LATIN1_SWEDISH_CI,
        self::LATIN1_DANISH_CI, self::LATIN1_GERMAN2_CI, self::LATIN1_BIN,
        self::LATIN1_GENERAL_CI, self::LATIN1_GENERAL_CS,
        self::LATIN1_SPANISH_CI, self::LATIN2_CZECH_CS,
        self::LATIN2_GENERAL_CI, self::LATIN2_HUNGARIAN_CI,
        self::LATIN2_CROATIAN_CI, self::LATIN2_BIN, self::SWE7_SWEDISH_CI,
        self::SWE7_BIN, self::ASCII_GENERAL_CI, self::ASCII_BIN,
        self::UJIS_JAPANESE_CI, self::UJIS_BIN, self::SJIS_JAPANESE_CI,
        self::SJIS_BIN, self::HEBREW_GENERAL_CI, self::HEBREW_BIN,
        self::TIS620_THAI_CI, self::TIS620_BIN, self::EUCKR_KOREAN_CI,
        self::EUCKR_BIN, self::KOI8U_GENERAL_CI, self::KOI8U_BIN,
        self::GB2312_CHINESE_CI, self::GB2312_BIN, self::GREEK_GENERAL_CI,
        self::GREEK_BIN, self::CP1250_GENERAL_CI, self::CP1250_CZECH_CS,
        self::CP1250_CROATIAN_CI, self::CP1250_BIN, self::CP1250_POLISH_CI,
        self::GBK_CHINESE_CI, self::GBK_BIN, self::LATIN5_TURKISH_CI,
        self::LATIN5_BIN, self::ARMSCII8_GENERAL_CI, self::ARMSCII8_BIN,
        self::UTF8_GENERAL_CI, self::UTF8_BIN, self::UTF8_UNICODE_CI,
        self::UTF8_ICELANDIC_CI, self::UTF8_LATVIAN_CI, self::UTF8_ROMANIAN_CI,
        self::UTF8_SLOVENIAN_CI, self::UTF8_POLISH_CI, self::UTF8_ESTONIAN_CI,
        self::UTF8_SPANISH_CI, self::UTF8_SWEDISH_CI, self::UTF8_TURKISH_CI,
        self::UTF8_CZECH_CI, self::UTF8_DANISH_CI, self::UTF8_LITHUANIAN_CI,
        self::UTF8_SLOVAK_CI, self::UTF8_SPANISH2_CI, self::UTF8_ROMAN_CI,
        self::UTF8_PERSIAN_CI, self::UTF8_ESPERANTO_CI,
        self::UTF8_HUNGARIAN_CI, self::UTF8_SINHALA_CI, self::UTF8_GERMAN2_CI,
        self::UTF8_CROATIAN_MYSQL561_CI, self::UTF8_UNICODE_520_CI,
        self::UTF8_VIETNAMESE_CI, self::UTF8_GENERAL_MYSQL500_CI,
        self::UTF8_CROATIAN_CI, self::UTF8_MYANMAR_CI, self::UTF8_THAI_520_W2,
        self::UCS2_GENERAL_CI, self::UCS2_BIN, self::UCS2_UNICODE_CI,
        self::UCS2_ICELANDIC_CI, self::UCS2_LATVIAN_CI, self::UCS2_ROMANIAN_CI,
        self::UCS2_SLOVENIAN_CI, self::UCS2_POLISH_CI, self::UCS2_ESTONIAN_CI,
        self::UCS2_SPANISH_CI, self::UCS2_SWEDISH_CI, self::UCS2_TURKISH_CI,
        self::UCS2_CZECH_CI, self::UCS2_DANISH_CI, self::UCS2_LITHUANIAN_CI,
        self::UCS2_SLOVAK_CI, self::UCS2_SPANISH2_CI, self::UCS2_ROMAN_CI,
        self::UCS2_PERSIAN_CI, self::UCS2_ESPERANTO_CI,
        self::UCS2_HUNGARIAN_CI, self::UCS2_SINHALA_CI, self::UCS2_GERMAN2_CI,
        self::UCS2_CROATIAN_MYSQL561_CI, self::UCS2_UNICODE_520_CI,
        self::UCS2_VIETNAMESE_CI, self::UCS2_GENERAL_MYSQL500_CI,
        self::UCS2_CROATIAN_CI, self::UCS2_MYANMAR_CI, self::UCS2_THAI_520_W2,
        self::CP866_GENERAL_CI, self::CP866_BIN, self::KEYBCS2_GENERAL_CI,
        self::KEYBCS2_BIN, self::MACCE_GENERAL_CI, self::MACCE_BIN,
        self::MACROMAN_GENERAL_CI, self::MACROMAN_BIN, self::CP852_GENERAL_CI,
        self::CP852_BIN, self::LATIN7_ESTONIAN_CS, self::LATIN7_GENERAL_CI,
        self::LATIN7_GENERAL_CS, self::LATIN7_BIN, self::UTF8MB4_GENERAL_CI,
        self::UTF8MB4_BIN, self::UTF8MB4_UNICODE_CI,
        self::UTF8MB4_ICELANDIC_CI, self::UTF8MB4_LATVIAN_CI,
        self::UTF8MB4_ROMANIAN_CI, self::UTF8MB4_SLOVENIAN_CI,
        self::UTF8MB4_POLISH_CI, self::UTF8MB4_ESTONIAN_CI,
        self::UTF8MB4_SPANISH_CI, self::UTF8MB4_SWEDISH_CI,
        self::UTF8MB4_TURKISH_CI, self::UTF8MB4_CZECH_CI,
        self::UTF8MB4_DANISH_CI, self::UTF8MB4_LITHUANIAN_CI,
        self::UTF8MB4_SLOVAK_CI, self::UTF8MB4_SPANISH2_CI,
        self::UTF8MB4_ROMAN_CI, self::UTF8MB4_PERSIAN_CI,
        self::UTF8MB4_ESPERANTO_CI, self::UTF8MB4_HUNGARIAN_CI,
        self::UTF8MB4_SINHALA_CI, self::UTF8MB4_GERMAN2_CI,
        self::UTF8MB4_CROATIAN_MYSQL561_CI, self::UTF8MB4_UNICODE_520_CI,
        self::UTF8MB4_VIETNAMESE_CI, self::UTF8MB4_CROATIAN_CI,
        self::UTF8MB4_MYANMAR_CI, self::UTF8MB4_THAI_520_W2,
        self::CP1251_BULGARIAN_CI, self::CP1251_UKRAINIAN_CI, self::CP1251_BIN,
        self::CP1251_GENERAL_CI, self::CP1251_GENERAL_CS,
        self::UTF16_GENERAL_CI, self::UTF16_BIN, self::UTF16_UNICODE_CI,
        self::UTF16_ICELANDIC_CI, self::UTF16_LATVIAN_CI,
        self::UTF16_ROMANIAN_CI, self::UTF16_SLOVENIAN_CI,
        self::UTF16_POLISH_CI, self::UTF16_ESTONIAN_CI, self::UTF16_SPANISH_CI,
        self::UTF16_SWEDISH_CI, self::UTF16_TURKISH_CI, self::UTF16_CZECH_CI,
        self::UTF16_DANISH_CI, self::UTF16_LITHUANIAN_CI,
        self::UTF16_SLOVAK_CI, self::UTF16_SPANISH2_CI, self::UTF16_ROMAN_CI,
        self::UTF16_PERSIAN_CI, self::UTF16_ESPERANTO_CI,
        self::UTF16_HUNGARIAN_CI, self::UTF16_SINHALA_CI,
        self::UTF16_GERMAN2_CI, self::UTF16_CROATIAN_MYSQL561_CI,
        self::UTF16_UNICODE_520_CI, self::UTF16_VIETNAMESE_CI,
        self::UTF16_CROATIAN_CI, self::UTF16_MYANMAR_CI,
        self::UTF16_THAI_520_W2, self::UTF16LE_GENERAL_CI, self::UTF16LE_BIN,
        self::CP1256_GENERAL_CI, self::CP1256_BIN, self::CP1257_LITHUANIAN_CI,
        self::CP1257_BIN, self::CP1257_GENERAL_CI, self::UTF32_GENERAL_CI,
        self::UTF32_BIN, self::UTF32_UNICODE_CI, self::UTF32_ICELANDIC_CI,
        self::UTF32_LATVIAN_CI, self::UTF32_ROMANIAN_CI,
        self::UTF32_SLOVENIAN_CI, self::UTF32_POLISH_CI,
        self::UTF32_ESTONIAN_CI, self::UTF32_SPANISH_CI,
        self::UTF32_SWEDISH_CI, self::UTF32_TURKISH_CI, self::UTF32_CZECH_CI,
        self::UTF32_DANISH_CI, self::UTF32_LITHUANIAN_CI,
        self::UTF32_SLOVAK_CI, self::UTF32_SPANISH2_CI, self::UTF32_ROMAN_CI,
        self::UTF32_PERSIAN_CI, self::UTF32_ESPERANTO_CI,
        self::UTF32_HUNGARIAN_CI, self::UTF32_SINHALA_CI,
        self::UTF32_GERMAN2_CI, self::UTF32_CROATIAN_MYSQL561_CI,
        self::UTF32_UNICODE_520_CI, self::UTF32_VIETNAMESE_CI,
        self::UTF32_CROATIAN_CI, self::UTF32_MYANMAR_CI,
        self::UTF32_THAI_520_W2, self::BINARY, self::GEOSTD8_GENERAL_CI,
        self::GEOSTD8_BIN, self::CP932_JAPANESE_CI, self::CP932_BIN,
        self::EUCJPMS_JAPANESE_CI, self::EUCJPMS_BIN
    ];

}
