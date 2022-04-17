<?php

namespace Tests\Browser\Modules\FrontendCMS;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Modules\FrontendCMS\Entities\Benifit;
use Modules\FrontendCMS\Entities\Faq;
use Modules\FrontendCMS\Entities\WorkingProcess;
use Tests\DuskTestCase;

class MerchantContentPageTest extends DuskTestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();


    }

    public function tearDown(): void
    {
        $benefits = Benifit::pluck('id');
        Benifit::destroy($benefits);

        $working_processes = WorkingProcess::pluck('id');
        WorkingProcess::destroy($working_processes);

        $faqs = Faq::pluck('id');
        Faq::destroy($faqs);

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    public function test_merchant_page_content()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/frontendcms/merchant-content')
                ->assertSee('Merchant Content')
                ->type('#mainTitle','initial main title')
                ->type('#subTitle', 'initial sub title')
                ->type('#mainSlug', 'initail slug')
                ->type('#pricing', 'initail pricing')
                ->type('#benifitTitle', 'initial Benifit Title')
                ->type('#howitworkTitle', 'initial How it work title')
                ->type('#pricingTitle', 'initial pricing title')
                ->type('#faqTitle', 'initial faq title')
                ->type('#queryTitle', 'initial query title')
                ->type('#formData > div > div:nth-child(2) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'test for test edit')
                ->type('#formData > div > div:nth-child(3) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'initial Benifit Description edit')
                ->type('#formData > div > div:nth-child(4) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'initial how it work Description edit')
                ->type('#formData > div > div:nth-child(5) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'initial pricing Description edit')
                ->type('#formData > div > div:nth-child(6) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'initial faq Description edit')
                ->type('#formData > div > div:nth-child(7) > div > div.col-xl-5 > div > div > div > div.note-editing-area > div.note-editable', 'initial query Description edit')
                ->click('#mainSubmit')
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Updated successfully!');

        });
    }

    public function test_for_create_benefit(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/frontendcms/merchant-content')
                ->click('.add_benefit_modal')
                ->whenAvailable('#item_add > div > div > div.modal-header > h4', function($modal){
                    $modal->type('#title', $this->faker->name)
                        ->attach('#item_create_form_image', public_path('/frontend/default/img/icon/icon_1.png'))
                        ->type('#description', 'test benefit')
                        ->click('#create_benefit_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Created successfully!');
        });
    }

    public function test_for_edit_benefit(){
        $this->test_for_create_benefit();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#benefit-td > td:nth-child(4) > p > i.fas.fa-edit.cus-poi.edit_benefit')
                ->whenAvailable('#edit_item_modal', function($modal){
                    $modal->attach('#item_edit_form_image', public_path('/frontend/default/img/icon/icon_2.png'))
                    ->click('#edit_benefit_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Updated successfully!');
        });
        
    }

    public function test_for_delete_benefit(){
        $this->test_for_create_benefit();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#benefit-td > td:nth-child(4) > p > i.fas.fa-trash-alt.cus-poi.ml-10.delete_benefit')
                ->whenAvailable('#delete_benefit_btn', function($modal){

                    $modal->click('#delete_benefit_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Deleted successfully!');
        });
    }


    public function test_for_create_working_process(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/frontendcms/merchant-content')
                ->click('#work_table > a')
                ->whenAvailable('#work_create_form', function($modal){
                    $modal->type('title', $this->faker->name)
                        ->attach('#work_create_form_image', public_path('/frontend/default/img/icon/icon_1.png'))
                        ->type('description', 'test working process')
                        ->click('#create_work_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Created successfully!');
        });
    }

    public function test_for_edit_working_process(){
        $this->test_for_create_working_process();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#default_table > tbody > tr > td:nth-child(4) > p > i.fas.fa-edit.cus-poi.edit_working_process')
                ->whenAvailable('#work_edit_form', function($modal){
                    $modal->type('title', $this->faker->name)
                        ->attach('#work_edit_form_image', public_path('/frontend/default/img/icon/icon_2.png'))
                        ->click('#theme_nav > li:nth-child(2) > label > span')
                        ->type('description', 'test working process edit')
                        ->click('#edit_work_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Updated successfully!');
        });
        
    }

    public function test_for_delete_working_process(){
        $this->test_for_create_working_process();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#default_table > tbody > tr > td:nth-child(4) > p > i.fas.fa-trash-alt.cus-poi.ml-10.delete_working_process')
                ->whenAvailable('#delete_work_btn', function($modal){

                    $modal->click('#delete_work_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Deleted successfully!');
        });
    }

    public function test_for_create_faq(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/frontendcms/merchant-content')
                ->click('#faq_table > a')
                ->whenAvailable('#faq_create_form', function($modal){
                    $modal->type('title', $this->faker->name)
                        ->click('#theme_nav > li:nth-child(2) > label > span')
                        ->type('description', 'test faq')
                        ->click('#create_faq_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Created successfully!');
        });
    }

    public function test_for_edit_faq(){
        $this->test_for_create_faq();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#default_table > tbody > tr > td:nth-child(4) > p > i.fas.fa-edit.cus-poi.edit_faq')
                ->whenAvailable('#faq_edit_form', function($modal){
                    $modal->type('title', $this->faker->name)
                        ->click('#theme_nav > li:nth-child(1) > label > span')
                        ->type('description', 'test faq edit')
                        ->click('#edit_faq_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Updated successfully!');
        });
        
    }

    public function test_for_delete_faq(){
        $this->test_for_create_faq();
        $this->browse(function (Browser $browser) {
            $browser->visit('/frontendcms/merchant-content')
                ->click('#default_table > tbody > tr > td:nth-child(4) > p > i.fas.fa-trash-alt.cus-poi.ml-10.delete_faq')
                ->whenAvailable('#delete_faq_btn', function($modal){

                    $modal->click('#delete_faq_btn');
                })
                ->waitFor('.toast-message',25)
                ->assertSeeIn('.toast-message', 'Deleted successfully!');
        });
    }

}
