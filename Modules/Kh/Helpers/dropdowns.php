<?php

// Country Helpers
if (!function_exists('countries_dropdown')) {

    /**
     * Get countries list.
     *
     * @return unknown
     */
    function countries_dropdown()
    {
        $countryRepository = resolve(Modules\Country\Contracts\CountryContract::class);

        return $countryRepository->allActiveExcludeBlock([], 0, ['*'], ['name' => 'asc'], true)->dropDown('name', 'id');
    }
}

// Country Helpers
if (!function_exists('countries_prefix_dropdown')) {

    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function countries_prefix_dropdown()
    {
        $countryRepository = resolve(Modules\Country\Contracts\CountryContract::class);

        return $countryRepository->allActive([], 0, ['*'], ['name' => 'asc'])->dropDownCountry('name', 'dialling_code');
    }
}

// client AccountType Helpers
if (!function_exists('clientAccountTypeList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function clientAccountTypeList()
    {
        $accountType = resolve(Modules\OaApplication\Entities\System\AccountType::class);
        return $accountType->where('table_by', $accountType::CLIENT)->active()->get()->dropDown('name', 'id');
    }
}

// partner AccountType Helpers
if (!function_exists('partnerAccountTypeList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function partnerAccountTypeList()
    {
        $accountType = resolve(Modules\OaApplication\Entities\System\AccountType::class);
        return $accountType->where('table_by', $accountType::PARTNER)->active()->get()->dropDown('name', 'id');
    }
}

// PlatformType Helpers
if (!function_exists('platformTypeList')) {
    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function platformTypeList($platform_type_id = null)
    {
        $platformType = resolve(Modules\OaApplication\Entities\System\PlatformType::class);
        if ($platform_type_id) {
            return $platformType->where('id', $platform_type_id)->active()->get()->dropDown('name', 'id');
        }
        return $platformType->active()->get()->dropDown('name', 'id');
    }
}

// PlatformType Helpers
if (!function_exists('leveragesList')) {
    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function leveragesList($leverage_id = null)
    {
        $leverage = resolve(Modules\OaApplication\Entities\System\Leverage::class);
        if ($leverage_id) {
            return $leverage->where('id', $leverage_id)->get()->dropDown('name', 'id');
        }
        return $leverage->get()->dropDown('name', 'id');
    }
}

// PlatformType Helpers
if (!function_exists('baseCurrencyList')) {
    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function baseCurrencyList($currency_id = null)
    {
        $baseCurrency = resolve(Modules\OaApplication\Entities\System\BaseCurrency::class);
        if ($currency_id) {
            return $baseCurrency->where('id', $currency_id)->get()->dropDown('name', 'id');
        }
        return $baseCurrency->get()->dropDown('name', 'id');
    }
}

// Genders Helpers
if (!function_exists('genderList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function genderList()
    {
        $gender = resolve(Modules\OaApplication\Entities\System\Gender::class);
        return $gender->get()->dropDown('name', 'id');
    }
}

// EmploymentStatus Helpers
if (!function_exists('employmentStatuseList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function employmentStatuseList()
    {
        $employmentStatus = resolve(Modules\OaApplication\Entities\System\EmploymentStatus::class);
        return $employmentStatus->get()->dropDown('name', 'id');
    }
}

// Business Type Helpers
if (!function_exists('businessType')) {
    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function businessType()
    {
        $business_types = resolve(Modules\OaApplication\Entities\System\BusinessType::class);
        return $business_types->get()->dropDown('name', 'id');
    }
}

// EducationLevel Helpers
if (!function_exists('educationLevelList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function educationLevelList()
    {
        $educationLevel = resolve(Modules\OaApplication\Entities\System\EducationLevel::class);
        return $educationLevel->get()->dropDown('name', 'id');
    }
}

// InditialDeposit Helpers
if (!function_exists('inditialDepositList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function inditialDepositList()
    {
        $inditialDeposit = resolve(Modules\OaApplication\Entities\System\InditialDeposit::class);
        return $inditialDeposit->get()->dropDown('name', 'id');
    }
}

// InvestmentFund Helpers
if (!function_exists('investmentFundList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function investmentFundList()
    {
        $investmentFund = resolve(Modules\OaApplication\Entities\System\InvestmentFund::class);
        return $investmentFund->get()->dropDown('name', 'id');
    }
}
// AnualIncomeOrSaving Helpers
if (!function_exists('anualIncomeOrSavingList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function anualIncomeOrSavingList()
    {
        $anualIncomeOrSaving = resolve(Modules\OaApplication\Entities\System\AnualIncomeOrSaving::class);
        return $anualIncomeOrSaving->get()->dropDown('name', 'id');
    }
}

// EstimatedInvestment Helpers
if (!function_exists('estimatedInvestmentList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function estimatedInvestmentList()
    {
        $estimatedInvestment = resolve(Modules\OaApplication\Entities\System\EstimatedInvestment::class);
        return $estimatedInvestment->get()->dropDown('name', 'id');
    }
}

// TradingExperience Helpers
if (!function_exists('tradingExperienceList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function tradingExperienceList()
    {
        $tradingExperience = resolve(Modules\OaApplication\Entities\System\TradingExperience::class);
        return $tradingExperience->get()->dropDown('name', 'id');
    }
}

// MonthlyVolumeTurnover Helpers
if (!function_exists('monthlyVolumeTurnoverList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function monthlyVolumeTurnoverList()
    {
        $monthlyVolumeTurnover = resolve(Modules\OaApplication\Entities\System\MonthlyVolumeTurnover::class);
        return $monthlyVolumeTurnover->get()->dropDown('name', 'id');
    }
}

// TradePerformance Helpers
if (!function_exists('tradePerformanceList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function tradePerformanceList()
    {
        $tradePerformance = resolve(Modules\OaApplication\Entities\System\TradePerformance::class);
        return $tradePerformance->get()->dropDown('name', 'id');
    }
}

// TradingPurpose Helpers
if (!function_exists('tradingPurposeList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function tradingPurposeList()
    {
        $tradingPurpose = resolve(Modules\OaApplication\Entities\System\TradingPurpose::class);
        return $tradingPurpose->get()->dropDown('name', 'id');
    }
}

// TradingPurpose Helpers
if (!function_exists('educationLevelList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function educationLevelList()
    {
        $educationLevel = resolve(Modules\OaApplication\Entities\System\EducationLevel::class);
        return $educationLevel->get()->dropDown('name', 'id');
    }
}

// usTaxNumberqa Helpers
if (!function_exists('usTaxNumberqaList')) {
    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function usTaxNumberqaList()
    {
        $usTaxNumber = [
            0   => __('p_portal.us_tax_numberqa_no'),
            '1' => __('p_portal.us_tax_numberqa_yes')

        ];
        return $usTaxNumber;
    }
}

// live account status Helpers
if (!function_exists('liveAccountStatusList')) {
    function liveAccountStatusList()
    {
        $live_account_status = resolve(Modules\TradingAccount\Entities\TradingAccountStatus::class);
        return $live_account_status->get()->dropDown('name', 'id');
    }
}

if (!function_exists('adminLiveAccountStatusList')) {
    function adminLiveAccountStatusList()
    {
        $live_account_status = resolve(Modules\TradingAccount\Entities\TradingAccountStatus::class);
        return $live_account_status
        ->whereNotIn('name', [$live_account_status::PENDING])
        ->get()
        ->dropDown('name', 'id');
    }
}

// TradingPurpose Helpers
if (!function_exists('kycStatusesList')) {
    function kycStatusesList()
    {
        $userStatusesList = resolve(Modules\OaApplication\Entities\System\KycStatus::class);
        return
        $userStatusesList
        ->whereNotIn('name', [$userStatusesList::PENDING])
        ->get()
        ->dropDown('name', 'id');
    }
}

// TradingPurpose Helpers
if (!function_exists('adminKycStatusesList')) {
    function adminKycStatusesList()
    {
        $userStatusesList = resolve(Modules\OaApplication\Entities\System\KycStatus::class);
        $exclusions       = [Modules\OaApplication\Entities\System\KycStatus::PENDING];
        return $userStatusesList->whereNotIn('name', $exclusions)->get()->dropDown('name', 'id');
    }
}

if (!function_exists('fund_method_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function fund_method_list()
    {
        $fundmethod = resolve(Modules\FundMethod\Entities\FundMethod::class);
        return $fundmethod->get()->dropdown('name', 'id');
    }
}
if (!function_exists('fund_category_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function fund_category_list()
    {
        $fundCategory = resolve(\Modules\FundMethod\Entities\FundCategory::class);
        return $fundCategory->get()->dropdown('name', 'id');
    }
}
if (!function_exists('withdrawal_role_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function withdrawal_role_list()
    {
        $withdrawal_role = resolve(\Modules\Withdrawal\Entities\WithdrawalRole::class);
        return $withdrawal_role->get()->dropdown('name', 'id');
    }
}

if (!function_exists('withdrawal_status_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function withdrawal_status_list($status_id = null)
    {
        $withdrawalStatusRepository = resolve(Modules\Withdrawal\Contracts\ClientWithdrawalStatusContract::class);
        $exclusions                 = [
            $withdrawalStatusRepository::PENDING,
            $withdrawalStatusRepository::CANCELLED
        ];
        if ($status_id) {
            return $withdrawalStatusRepository->find($status_id)->name;
        }
        return $withdrawalStatusRepository->all()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

if (!function_exists('clientActiveTradingAccount')) {
    function clientActiveTradingAccount($user_id = null)
    {
        $tradingAccount = resolve(Modules\TradingAccount\Contracts\ClientTradingAccountContract::class);
        return $tradingAccount->getAllActiveAccount($user_id);
    }
}

if (!function_exists('adminInternalTransferKycStatusesList')) {
    function adminInternalTransferKycStatusesList($current = null, $status_id = null)
    {
        $internalTransferStatus = resolve(Modules\InternalTransfer\Contracts\InternalTransferStatusContract::class);
        $exclusions             = [
            $internalTransferStatus::PENDING,
            $internalTransferStatus::CANCELLED,
        ];
        if ($current) {
            array_push($exclusions, $current);
        }
        if ($status_id) {
            return $internalTransferStatus->find($status_id)->name;
        }
        return $internalTransferStatus->all()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

if (!function_exists('adminKycDepositStatuses')) {
    function adminKycDepositStatuses($status_id = null)
    {
        $depositStatusRepository = resolve(Modules\Deposit\Contracts\ClientDepositStatusContract::class);
        $exclusions              = [
            $depositStatusRepository::PENDING,
            $depositStatusRepository::PROCESSING,
            $depositStatusRepository::CANCELLED,
        ];
        if ($status_id) {
            return $depositStatusRepository->find($status_id)->name;
        }
        return $depositStatusRepository->all()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

// Deposits Histories Currency Helpers
if (!function_exists('depositHistoriesCurrency')) {
    function depositHistoriesCurrency($client_account_id)
    {
        $depositHistoriesCurrency = resolve(Modules\Deposit\Entities\ClientDeposit::class);
        $whereIn                  = $depositHistoriesCurrency->where('client_account_id', $client_account_id)->distinct('deposit_currency_id')->pluck('deposit_currency_id');
        $currency                 = resolve(Modules\Currency\Entities\Currency::class);

        return $currency->whereIn('id', $whereIn)->where(['is_bank_currency' => 1, 'is_active' => 1])->pluck('name', 'id');
    }
}

if (!function_exists('feeTypeList')) {
    function feeTypeList()
    {
        $feetype = resolve(\Modules\FundMethod\Entities\FeeType::class);
        return $feetype->get()->dropDown('name', 'id');
    }
}

// DepositCurrencyFee Helpers
if (!function_exists('depositCurrencyFee')) {
    function depositCurrencyFee()
    {
        $depositCurrencyFee = resolve(Modules\Deposit\Entities\DepositMethodCurrency::class);
        return $depositCurrencyFee->with('fee_type')->get()->dropDownFundingFee('name', 'currency_id');
    }
}


// DepositCurrencyFee Helpers
if (!function_exists('user_change_status_list')) {
    function user_change_status_list($current = null)
    {
        $status     = resolve(Modules\UserChange\Entities\UserChangeStatus::class);
        $exclusions = [$status::PENDING, $status::PROCESSING];
        if ($current) {
            array_push($exclusions, $current);
        }
        return $status->all()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

// Currency Helpers
if (!function_exists('currencies_dropdown')) {
    function currencies_dropdown()
    {
        $currency = resolve(Modules\Currency\Entities\Currency::class);
        return $currency->where(['is_bank_currency' => 1, 'is_active' => 1])->orderBy('sort', 'asc')->pluck('name', 'id');
    }
}

// Currency Helpers
if (!function_exists('all_currencies_dropdown')) {
    function all_currencies_dropdown()
    {
        $currency = resolve(Modules\Currency\Entities\Currency::class);
        return $currency->where([ 'is_active' => 1])->orderBy('sort', 'asc')->pluck('name', 'id');
    }
}

// PlatformType Helpers
if (!function_exists('spread_types')) {
    /**
     * Get countries prefix list.
     *
     * @return unknown
     */
    function spread_types()
    {
        $platformType = resolve(Modules\OaApplication\Entities\System\SpreadType::class);
        return $platformType->get()->dropDown('name', 'id');
    }
}

if (!function_exists('user_status_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function user_status_list($current = null)
    {
        $status     = resolve(Modules\User\Entities\UserStatus::class);
        $exclusions = [$status::PENDING];
        if ($current) {
            array_push($exclusions, $current);
        }
        return $status->active()->get()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

if (!function_exists('admin_user_status_list')) {

    /**
     * Get countries prefix list.
     *
     * @return type client / partner
     */
    function admin_user_status_list($current = null)
    {
        $status     = resolve(Modules\User\Entities\UserStatus::class);
        $exclusions = [$status::PENDING, $status::SUSPENDED];
        if ($current) {
            array_push($exclusions, $current);
        }
        return $status->all()->whereNotIn('rawname', $exclusions)->dropDown('name', 'id');
    }
}

// Translator Helpers
if (!function_exists('translator_groups_dropdown')) {

    /**
     * Get translator group list.
     * The format for this 'slug' => 'rawname'
     *
     * @return unknown
     */
    function translator_groups_dropdown()
    {
        $repository = resolve(\Modules\Translation\Contracts\TranslatorGroupContract::class);
        $data =  $repository->all([], 0, ['*'], ['name' => 'asc']);
        if($repository->all([], 0, ['*'], ['name' => 'asc'])->count()>0){
            return $data->dropDown('name', 'id');
        }

        return $data;
    }
}

if (!function_exists('translator_pages_dropdown')) {

    /**
     * Get translator page list.
     * The format for this 'slug' => 'rawname'
     *
     * @return unknown
     */
    function translator_pages_dropdown()
    {
        $repository = resolve(\Modules\Translation\Contracts\TranslatorPageContract::class);
        $data =  $repository->all([], 0, ['*'], ['name' => 'asc']);
        if($repository->all([], 0, ['*'], ['name' => 'asc'])->count()>0){
            return $data->dropDown('name', 'id');
        }

        return $data;
    }
}


if (!function_exists('clientUserRole')) {
    /**
     * Get admin FundMethod list
     *
     * @return unknown
     */
    function clientUserRole()
    {
        $roles       = resolve(Modules\Rbac\Entities\Role::class);
        $clientRoles = $roles->clients()->get()->dropdown('name', 'id');
        return $clientRoles;
    }
}

if (!function_exists('partnerUserRole')) {
    /**
     * Get admin FundMethod list
     *
     * @return unknown
     */
    function partnerUserRole()
    {
        $roles        = resolve(Modules\Rbac\Entities\Role::class);
        $partnerRoles = $roles->partners()->get()->dropdown('name', 'id');
        return $partnerRoles;
    }
}

