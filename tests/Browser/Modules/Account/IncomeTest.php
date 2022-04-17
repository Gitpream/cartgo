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

class IncomeTest extends DuskTestCase
{
    use WithFaker;

    protected $chart_of_accounts = [];

    public function setUp(): void
    {
        parent::setUp();

        

        $this->chart_of_accounts[] = ChartOfAccount::create([
            'code' => 'Income-6',
            'type' => 'Income',
            'default_for' => 'Product Wise Tax Account',
            'name' => 'Product Tax',
            'opening_balance' => 0,
            'description' => null,
            'level' => 0,
            'status' => 1,
            'created_by' => 1
        ]);

        $this->chart_of_accounts[] = ChartOfAccount::create([
            'code' => 'Income-1',
            'type' => 'Income',
            'default_for' => 'Income',
            'name' => 'Amaz Cart Income',
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
    public function test_for_visit_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                ->visit('/account/incomes')
                ->assertSee('Incomes');
        });
    }

    public function test_for_with_cash_create_income(){
        $this->test_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                ->whenAvailable('#income_modal > div', function($modal){
                    $modal->pause(2000)
                        ->click('#title')
                        ->type('#title', 'test-income-one')
                        ->click('#income_form > div > div > div:nth-child(2) > div > div')
                        ->click('#income_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(3)')
                        ->click('#income_form > div > div > div:nth-child(3) > div > div')
                        ->click('#income_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(1)')
                        ->pause(1000)
                        ->type('#amount', '10')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#income_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');

                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested income created successful');

        });
    }

    public function test_for_bank_with_bank_create_income(){
        $this->test_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                    ->whenAvailable('#income_modal > div', function($modal){
                        $modal->pause(2000)
                            ->click('#title')
                            ->type('#title', 'test-income-one')
                            ->click('#income_form > div > div > div:nth-child(2) > div > div')
                            ->click('#income_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(3)')
                            ->click('#income_form > div > div > div:nth-child(3) > div > div')
                            ->click('#income_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                            ->pause(2000)
                            ->click('#income_form > div > div > div.col-xl-6.mb-25 > div > div')
                            ->click('#income_form > div > div > div.col-xl-6.mb-25 > div > div > ul > li:nth-child(2)')
                            ->type('#amount', '20')
                            ->attach('#file', __DIR__.'/files/favicon.png')
                            ->type('#description', $this->faker->paragraph)
                            ->click('#income_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                    }, 25)
                    ->waitFor('.toast-message',25)
                    ->assertSeeIn('.toast-message', 'The requested income created successful');
                    
        });
    }

    public function test_for_with_cheque_create_income(){
        $this->test_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                    ->whenAvailable('#income_modal > div', function($modal){
                        $modal->pause(2000)
                            ->click('#title')
                            ->type('#title', 'test-income-one')
                            ->click('#income_form > div > div > div:nth-child(2) > div > div')
                            ->click('#income_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(3)')
                            ->click('#income_form > div > div > div:nth-child(3) > div > div')
                            ->click('#income_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(3)')
                            ->pause(2000)
                            ->type('#amount', '30')
                            ->attach('#file', __DIR__.'/files/favicon.png')
                            ->type('#description', $this->faker->paragraph)
                            ->click('#income_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                    }, 25)
                    ->waitFor('.toast-message',25)
                    ->assertSeeIn('.toast-message', 'The requested income created successful');        
        });
    }

    public function test_for_validate_check_create(){
        $this->test_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->click('#main-content > section > div > div > div.col-12 > div > div > ul > li > a')
                    ->whenAvailable('#income_modal > div', function($modal){
                        $modal->pause(2000)
                            ->click('#title')
                            ->click('#income_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit')
                            ->pause(2000)
                            ->assertSee('This value is required.');
                    }, 25);
                    
        });            
    }

    public function test_for_cash_edit_with_cash_income_to_bank(){
        $this->test_for_with_cash_create_income();

        $this->browse(function (Browser $browser) {
            $browser->pause(5000)
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#income_modal > div', function($modal){
                    $modal->pause(2000)
                        ->click('#title')
                        ->type('#title', 'test-income-one-edit')
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                        ->pause(2000)
                        ->click('#bank_column > div > div')
                        ->click('#bank_column > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#income_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested income updated successful');

        });
    }

    public function test_for_bank_edit_with_bank_income_to_cash(){
        $this->test_for_bank_with_bank_create_income();
        $this->browse(function (Browser $browser) {
            $browser->pause(5000)
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#income_modal > div', function($modal){
                    $modal->pause(2000)
                        ->click('#title')
                        ->type('#title', 'test-income-one-edit')
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(1)')
                        ->pause(2000)
                        ->type('#amount', '10')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#income_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested income updated successful');

        });            

    }

    public function test_for_edit_with_cheque_income_to_bank(){
        $this->test_for_with_cheque_create_income();
        $this->browse(function (Browser $browser) {
            $browser->pause(5000)
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.btn-modal')
                ->whenAvailable('#income_modal > div', function($modal){
                    $modal->pause(1000)
                        ->click('#title')
                        ->type('#title', 'test-income-one-edit')
                        ->pause(3000)
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(2) > div > div > ul > li:nth-child(2)')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div')
                        ->click('#income_edit_form > div > div > div:nth-child(3) > div > div > ul > li:nth-child(2)')
                        ->pause(5000)
                        ->click('#bank_column > div > div')
                        ->click('#bank_column > div > div > ul > li:nth-child(2)')
                        ->type('#amount', '20')
                        ->attach('#file', __DIR__.'/files/favicon.png')
                        ->type('#description', $this->faker->paragraph)
                        ->click('#income_edit_form > div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                }, 25)
                
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested income updated successful');
            });        
    }



    public function test_for_delete_income(){
        $this->test_for_with_cash_create_income();
        $this->browse(function (Browser $browser) {
            $browser->pause(5000)
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > button')
                ->click('#income-table > tbody > tr > td:nth-child(7) > div > div > a.dropdown-item.delete_item')
                ->whenAvailable('#delete_modal_form', function($modal){
                    $modal->click('div > div > div.col-lg-12.text-center > div > button.primary-btn.fix-gr-bg.submit');
                },5)
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'The requested income deleted successful');
        });

    }

}