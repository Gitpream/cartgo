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

class TransactionTest extends DuskTestCase
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

        Transaction::create([
            'title' => 'test-transaction-1',
            'chart_of_account_id' => 1,
            'bank_account_id' => 1,
            'type' => 'in',
            'payment_method' => 'Cash',
            'come_from' => 'income',
            'description' => 'test',
            'amount' => 20,
            'transaction_date' => date('Y-m-d'),
            'created_by' => 1
        ]);

        Transaction::create([
            'title' => 'test-transaction-2',
            'chart_of_account_id' => 1,
            'bank_account_id' => 1,
            'type' => 'in',
            'payment_method' => 'Cash',
            'come_from' => 'income',
            'description' => 'test',
            'amount' => 20,
            'transaction_date' => date('Y-m-d', strtotime('2021-07-02')),
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
                ->visit('/account/transaction')
                ->assertSee('Transaction');
        });
    }

    public function test_for_filter_custom_date(){
        $this->test_for_visit_index_page();
        $this->browse(function (Browser $browser) {
            $browser->pause(5000)
                ->click('#date_range')
                ->pause(1000)
                ->click('div.daterangepicker.ltr.show-ranges.opensright.show-calendar > div.drp-calendar.left > div.calendar-table > table > tbody > tr:nth-child(1) > td:nth-child(5)')
                ->click('div.daterangepicker.ltr.show-ranges.opensright.show-calendar > div.drp-calendar.right > div.calendar-table > table > tbody > tr:nth-child(4) > td:nth-child(6)')
                ->click('div.daterangepicker.ltr.show-ranges.opensright.show-calendar > div.drp-buttons > button.applyBtn.btn.btn-sm.btn-primary')
                ->pause(5000)
                ->waitForTextIn('#DataTables_Table_0 > tbody > tr.odd > td:nth-child(4)','test-transaction-1', 25); 

        });
    }
}
