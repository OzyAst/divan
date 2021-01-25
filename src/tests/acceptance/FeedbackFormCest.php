<?php

use Codeception\Example;
use yii\helpers\Url;

/**
 * Форма обратной связи
 */
class FeedbackFormCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/feedback/index'));
    }

    public function feedbackPageOpen(AcceptanceTester $I)
    {
        $I->seeElement('input', ['name' => "Feedback[customer]"]);
        $I->seeElement('input', ['name' => "Feedback[phone]"]);
    }

    /**
     * @dataProvider getFormDataValid
     */
    public function feedbackFormCanBeSubmitted(AcceptanceTester $I, Example $form)
    {
        $I->fillField('#feedback-customer', $form['customer']);
        $I->fillField('#feedback-phone', $form['phone']);

        $I->click('Submit');
        $I->wait(2); // wait for button to be clicked

        $I->dontSeeElement('.error-summary');
        $I->seeInField('#feedback-customer', '');
        $I->seeInField('#feedback-phone', '');
    }

    /**
     * @dataProvider getFormDataInvalid
     */
    public function feedbackFormError(AcceptanceTester $I, Example $form)
    {
        $I->fillField('#feedback-customer', $form['customer']);
        $I->fillField('#feedback-phone', $form['phone']);

        $I->click('Submit');
        $I->wait(2); // wait for button to be clicked

        $I->seeElement('.error-summary');
    }

    private function getFormDataValid()
    {
        return [
            ['phone' => '+7(987)666-55-44', 'customer' => ''],
            ['phone' => '+7(987)666-55-44', 'customer' => 'Иванов Иван Иваныч'],
        ];
    }

    private function getFormDataInvalid()
    {
        return [
            ['phone' => '+7(987)6665544', 'customer' => 'Иванов Иван Иваныч'],
            ['phone' => '+7987666-55-44', 'customer' => 'Иванов Иван Иваныч'],
            ['phone' => '7(987)666-55-44', 'customer' => 'Иванов Иван Иваныч'],
            ['phone' => '7(987)666-55-444', 'customer' => 'Иванов Иван Иваныч'],
            ['phone' => '+7(987)666-55-444', 'customer' => 'Иванов Иван Иваныч'],
            ['phone' => '', 'customer' => 'Иванов Иван Иваныч'],
        ];
    }
}
