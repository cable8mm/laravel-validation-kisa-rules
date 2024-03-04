<?php

namespace Cable8mm\ValidationKisaRules\Tests\Rules;

use Cable8mm\ValidationKisaRules\Rules\KisaPassword;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;

class KisaPasswordTest extends TestCase
{
    use WithWorkbench;

    protected $enablesPackageDiscoveries = true;

    protected function getPackageProviders($app)
    {
        return [
            'Illuminate\Translation\TranslationServiceProvider',
        ];
    }

    public function test_pass_according_to_kisa_password_rule_or_not()
    {
        $rule = new KisaPassword();

        $passwords = [
            '12345678' => false,
            'abcdefgha' => false,
            // Pass Condition 1
            '12345678232342' => true,
            // Pass Condition 1
            'skdfjoaweijfae' => true,
            // Pass Condition 2
            '12345678a' => true,
            // Pass Condition 2
            '123asd!!' => true,
            'ijiasdfj2@fjdsk' => true,
        ];

        foreach ($passwords as $password => $expected) {
            $actual = $rule->passes('attribute', $password);

            $this->assertEquals($expected, $actual, $password);
        }
    }

    public function test_validate_message_can_be_seen()
    {
        $rule = new KisaPassword();

        $actual = $rule->passes('attribute', '1');

        $this->assertEquals('validationKisaRules::messages.kisa_password', $rule->message());
    }
}
