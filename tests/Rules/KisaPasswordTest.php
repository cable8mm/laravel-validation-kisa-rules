<?php

namespace Cable8mm\ValidationKisaRules\Tests\Rules;

use Cable8mm\ValidationKisaRules\Rules\KisaPassword;
use Orchestra\Testbench\TestCase;

class KisaPasswordTest extends TestCase
{
    public function test_kisa_password_rule()
    {
        // Arrange
        // 문자,숫자,특수 문자 세가지 중 2가지 이상 8자-20자 또는 세가지 중 1가지 이상 10자-20자 입니다.
        $kisaPasswordRule = new KisaPassword();

        $passwords = [
            '12345678' => false,
            'abcdefgha' => false,
            '12345678a' => true,
            '123asd!!' => true,

        ];

        // Act
        foreach ($passwords as $password => $expected) {
            $actual = $kisaPasswordRule->passes('attribute', $password);

            // Assert
            $this->assertEquals($expected, $actual, $password);
        }
    }
}
