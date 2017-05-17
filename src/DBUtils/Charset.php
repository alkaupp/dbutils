<?php

namespace AKUtils\DBUtils;

class Charset
{
    const BIG5 = "big5";
    const DEC8 = "dec8";
    const CP850 = "cp850";
    const HP8 = "hp8";
    const KOI8R = "koi8r";
    const LATIN1 = "latin1";
    const LATIN2 = "latin2";
    const SWE7 = "swe7";
    const ASCII = "ascii";
    const UJIS = "ujis";
    const SJIS = "sjis";
    const HEBREW = "hebrew";
    const TIS620 = "tis620";
    const EUCKR = "euckr";
    const KOI8U = "koi8u";
    const GB2312 = "gb2312";
    const GREEK = "greek";
    const CP1250 = "cp1250";
    const GBK = "gbk";
    const LATIN5 = "latin5";
    const ARMSCII8 = "armscii8";
    const UTF8 = "utf8";
    const UCS2 = "ucs2";
    const CP866 = "cp866";
    const KEYBCS2 = "keybcs2";
    const MACCE = "macce";
    const MACROMAN = "macroman";
    const CP852 = "cp852";
    const LATIN7 = "latin7";
    const UTF8MB4 = "utf8mb4";
    const CP1251 = "cp1251";
    const UTF16 = "utf16";
    const CP1256 = "cp1256";
    const CP1257 = "cp1257";
    const UTF32 = "utf32";
    const BINARY = "binary";
    const GEOSTD8 = "geostd8";
    const CP932 = "cp932";
    const EUCJPMS = "eucjpms";

    const LIST = [
        self::BIG5, self::DEC8, self::CP850, self::HP8, self::KOI8R, self::LATIN1,
        self::LATIN2, self::SWE7, self::ASCII, self::UJIS, self::SJIS,
        self::HEBREW, self::TIS620, self::EUCKR, self::KOI8U, self::GB2312,
        self::GREEK, self::CP1250, self::GBK, self::LATIN5, self::ARMSCII8,
        self::UTF8, self::UCS2, self::CP866, self::KEYBCS2, self::MACCE,
        self::MACROMAN, self::CP852, self::LATIN7, self::UTF8MB4, self::CP1251,
        self::UTF16, self::CP1256, self::CP1257, self::UTF32, self::BINARY,
        self::GEOSTD8, self::CP932, self::EUCJPMS
    ];
}
