<?php

namespace Tests\Browser\Modules\Account;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Laravel\Dusk\Browser;
use Modules\Account\Entities\BankAccount;
use Modules\Account\Entities\ChartOfAccount;
use Modules\Account\Entities\Transaction;
use Tests\DuskTestCase;

class ExpenseTest extends DuskTestCase
{
    use WithFaker;

    protected $chart_of_accounts = [];

    public function setUp(): void
    {
        parent::setUp();

        

        $this->chart_of_accounts[] = ChartOfAccount::create([
            'code' => 'Expense-1',
            'type' => 'Expense',
            'default_for' => 'Expense',
            'name' => 'Amaz Cart Expense',
            'opening_balance' => 0,
            'description' => null,
            'level' => 0,
            'status' => 1,
            'created_by' => 1
        ]);

        BankAccount::create([
            'bank_name' => 'Dutch Bangla',
            'branch_name' => 'Savar',
            'account_name' => 'Cartgo',
            'account_number' => '216532356',
            'opening_balance' => 0,
            'status' => 1,
            'created_by' => 1
        ]);
            

    }

    public function tearDown(): void
    {

        $charts = ChartOfAccount::pluck('id');
        ChartOfAccount::destroy($charts);

        $accounts = BankAccount::pluck('id');
        BankAccount::destroy($accounts);

        $transactions = Transaction::all();
        foreach($transactions as $trans){
            if(File::exists(public_path($trans->file))){
                File::delete(public_path($trans->file));
            }
            $trans->delete();
        }

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_1_for_visit_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                ->visit('/account/expenses')
                ->assertSee('Expense');
        });
    }

    public function test_2_for_with_cash_create_expanse(){
        $this->test_1_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div > span')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(1)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense created successful');

        });
    }

    public function test_3_for_bank_with_create_expanse(){
        $this->test_1_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                        ->pause(1000)
                        ->click('#expense_form > div > div > div.col-xl-6.mb-25 > div > div')
                        ->click('#expense_form > div > div > div.col-xl-6.mb-25 > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                        
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense created successful');

        });
    }

    public function test_for_4_cheque_with_create_expanse(){
        $this->test_1_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(3)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense created successful');

        });
    }

    public function test_5_for_validate_check_create(){
        $this->test_1_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit')
                        ->waitForText('This value is required.', 5)
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                        ->pause(1000)
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit')
                        ->waitForText('This value is required.', 5)
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(3)')
                        ->click('#expense_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit')
                        ->waitForText('This value is required.', 5);

                }, 25);
            });            
    }

    public function test_6_for_cash_with_cash_edit_expanse_to_bank(){
        $this->test_2_for_with_cash_create_expanse();
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#expense-table > tbody > tr > td.sorting_1', 25)
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one-edit')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#expense_edit_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                        ->pause(1000)
                        ->click('#expense_edit_form > div > div > div.col-xl-6.mb-25 > div > div')
                        ->click('#expense_edit_form > div > div > div.col-xl-6.mb-25 > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '10')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_edit_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_edit_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');

                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense updated successful');
        });
    }

    public function test_7_for_bank_with_bank_edit_expense_to_cash(){
        $this->test_3_for_bank_with_create_expanse();
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#expense-table > tbody > tr > td.sorting_1', 25)
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one-edit')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#expense_edit_form > div > div > div:nth-child(3) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(1)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_edit_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_edit_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense updated successful');
        });            
    }

    public function test_8_for_checque_with_checque_edit_expense(){
        $this->test_for_4_cheque_with_create_expanse();
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#expense-table > tbody > tr > td.sorting_1', 25)
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', 'test-expanse-one-edit')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_edit_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_edit_form > div > div > div:nth-child(9) > div > label > span')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#expense_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense updated successful');
        });
    }

    public function test_9_for__edit_validate_edit(){
        $this->test_for_4_cheque_with_create_expanse();
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#expense-table > tbody > tr > td.sorting_1', 25)
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#expense_modal > div', function($modal){
                    $modal->pause(2000)
                        ->type('#title', '')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#expense_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->click('#expense_edit_form > div > div > div:nth-child(8) > div > label > span')
                        ->click('#expense_edit_form > div > div > div:nth-child(9) > div > label > span')
                        ->click('#expense_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit')
                        ->pause(2000)
                        ->assertSee('This value is required.');
                }, 25);
        });
    }

    public function test_10_for_delete_expense(){
        $this->test_for_4_cheque_with_create_expanse();
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#expense-table > tbody > tr > td.sorting_1', 25)
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#expense-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.delete_item')
                ->whenAvailable('#delete_modal_form', function($modal){
                    $modal->pause(5000)
                        ->click('div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 5)

                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested expense deleted successful');
        });        
    }

}