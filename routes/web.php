<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Customer\RegController;
use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Firm\FirmSetupController;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Reports\ReportsController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Task\TaskMangerController;
use App\Http\Controllers\Leave\LeaveSetupController;
use App\Http\Controllers\Customer\EnquiriesController;
use App\Http\Controllers\Firm\LocationSetupController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\MainSetup\MainSetupController;
use App\Http\Controllers\Customer\ApplicationController;
use App\Http\Controllers\Equipment\EquipmentControoller;
use App\Http\Controllers\Holiday\HolidaySetupController;
use App\Http\Controllers\ReviewManager\ReviewController;
use App\Http\Controllers\Leave\LeaveApplicationController;
use App\Http\Controllers\RenewalManager\RenewalController;
use App\Http\Controllers\BillPayment\BillPaymentController;
use App\Http\Controllers\Customer\CustomerPermitController;
use App\Http\Controllers\ImpactAssessment\ImpactController;
use App\Http\Controllers\Customer\CustomerFinanceController;
use App\Http\Controllers\IncidentManager\IncidentController;
use App\Http\Controllers\IssuanceManager\IssuanceController;
use App\Http\Controllers\Customer\ImpactAssessmentController;
use App\Http\Controllers\Registration\RegistrationController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\InspectionManager\CertificateController;
use App\Http\Controllers\UserManagement\UserManagementController;
use App\Http\Controllers\ApplicationManager\ApplicationManagerController;


Route::get('/',[AuthenticationController::class,'index']);
Route::get('login',[AuthenticationController::class,'index'])->name('login');

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

/* Authentication */ 

Route::post('authentication-process',[AuthenticationController::class,'authenticationProcess'])->name('authentication-process');
Route::post('logout-authentication-process',[DashboardController::class,'logoutAuthenticationProcess'])->name('logout-authentication-process');


/* User Management */ 

Route::get('user-management-add-category',[UserManagementController::class,'userCategoryView'])->name('user-management-add-category');
Route::post('user-management-add-category-process',[UserManagementController::class,'userCategoryProcess'])->name('user-management-add-category-process');
Route::get('user-management-add-category-edit/{id}',[UserManagementController::class,'editUserCategoryView'])->name('user-management-add-category-edit');
Route::post('user-management-add-category-edit-process/{id}',[UserManagementController::class,'editUserCategoryProcess'])->name('user-management-add-category-edit-process');

Route::get('user-management-privilege',[UserManagementController::class,'assignUserPrivilegesView'])->name('user-management-privilege');
Route::post('get-category-privileges',[UserManagementController::class,'getUserPrivileges'])->name('get-category-privileges');
Route::post('save-user-privileges',[UserManagementController::class,'saveUserPrivileges'])->name('save-user-privileges');

Route::get('user-management-create-account',[UserManagementController::class,'createAccountUser'])->name('user-management-create-account');
Route::post('get-user-email-process',[UserManagementController::class,'getAccountEmail']);
Route::post('create-account-process',[UserManagementController::class,'createAccount'])->name('create-account-process');

Route::get('user-management-list-create-account',[UserManagementController::class,'listAccountsView'])->name('user-management-list-create-account');
Route::any('user-management-get-accounts',[UserManagementController::class,'getUserAccountList'])->name('user-management-get-accounts');

Route::get('user-management-edit-user-account/{id}',[UserManagementController::class,'editUserAccountView'])->name('user-management-edit-user-account');
Route::post('user-management-edit-user-account-process/{id}',[UserManagementController::class,'editUserAccountProcess'])->name('user-management-edit-user-account-process');

/* End User Management */ 

/* Main setup */
Route::get('main-setup-facility',[MainSetupController::class,'facilityView'])->name('main-setup-facility');
Route::post('main-setup-facility-insert-process',[MainSetupController::class,'insertFacilityProcess'])->name('main-setup-facility-insert-process');
Route::get('main-setup-facility-edit-view/{id}',[MainSetupController::class,'facilityEditView'])->name('main-setup-facility-edit-view');
Route::post('main-setup-facility-edit-view-process/{id}',[MainSetupController::class,'updateFacilityProcess'])->name('main-setup-facility-edit-view-process');

Route::post('main-setup-facility-type-insert-process',[MainSetupController::class,'insertFacilityTypeProcess'])->name('main-setup-facility-type-insert-process');
Route::get('main-setup-facility-type-edit-view/{id}',[MainSetupController::class,'facilityTypeEditView'])->name('main-setup-facility-type-edit-view');
Route::post('main-setup-facility-type-edit-view-process/{id}',[MainSetupController::class,'insertFacilityTypeEditProcess'])->name('main-setup-facility-type-edit-view-process');

Route::get('activity-setup-facility',[MainSetupController::class,'activityView'])->name('activity-setup-facility');
Route::post('activity-setup-facility-insert-process',[MainSetupController::class,'addActivityTypeProcess'])->name('activity-setup-facility-insert-process');
Route::get('activity-setup-facility-edit-view/{id}',[MainSetupController::class,'editAddActivityTypeProcess'])->name('activity-setup-facility-edit-view');
Route::post('activity-setup-facility-edit-view-process/{id}',[MainSetupController::class,'updtaeActivityTypeProcess'])->name('activity-setup-facility-edit-view-process');

Route::post('activity-setup-activity-insert',[MainSetupController::class,'insertActivityProcess'])->name('activity-setup-activity-insert');
Route::get('activity-setup-activity-edit-view/{id}',[MainSetupController::class,'editActivityView'])->name('activity-setup-activity-edit-view');
Route::post('activity-setup-activity-edit-process/{id}',[MainSetupController::class,'UpdateActivityProcess'])->name('activity-setup-activity-edit-process');

Route::get('addPhase',[MainSetupController::class,'phaseView'])->name('addPhase');
Route::post('add-phase-process',[MainSetupController::class,'addPhase'])->name('add-phase-process');
Route::get('edit-phase/{id}',[MainSetupController::class,'editphaseView'])->name('edit-phase');
Route::post('edit-phase-process/{id}',[MainSetupController::class,'editphase'])->name('edit-phase-process');

Route::get('Project-Sector',[MainSetupController::class,'projectsectorview'])->name('Project-Sector');
Route::post('add-project-sector-process',[MainSetupController::class,'addSector'])->name('add-project-sector-process');
Route::get('edit-sector/{id}',[MainSetupController::class,'editsectorView'])->name('edit-sector');
Route::post('edit-project-sector-process/{id}',[MainSetupController::class,'editSector'])->name('edit-project-sector-process');
Route::get('Project-Category',[MainSetupController::class,'projectcategoryview'])->name('Project-Category');
Route::post('add-project-category-process',[MainSetupController::class,'addCategory'])->name('add-project-category-process');
Route::get('edit-category/{id}',[MainSetupController::class,'editcategoryView'])->name('edit-category');
Route::post('edit-project-category-process/{id}',[MainSetupController::class,'editCategory'])->name('edit-project-category-process');
Route::get('Project-Type',[MainSetupController::class,'projecttypeview'])->name('Project-Type');
Route::post('add-project-type-process',[MainSetupController::class,'addType'])->name('add-project-type-process');
Route::get('edit-type/{id}',[MainSetupController::class,'edittypeView'])->name('edit-type');
Route::post('edit-project-type-process/{id}',[MainSetupController::class,'editType'])->name('edit-project-type-process');

Route::get('findCategoryData',[MainSetupController::class,'findCategoryData'])->name('findCategoryData');
Route::get('findDocTypeData',[MainSetupController::class,'findDocTypeData'])->name('findDocTypeData');

Route::get('equipment-setup',[EquipmentControoller::class,'index'])->name('equipment-setup');
Route::post('equipment-inser-alarm-system',[EquipmentControoller::class,'alarmSystemInsert'])->name('equipment-inser-alarm-system');
Route::get('equipment-edit-alarm-system-view/{id}',[EquipmentControoller::class,'alarmSystemInsertEditView'])->name('equipment-edit-alarm-system-view');
Route::post('equipment-edit-alarm-system-view-process/{id}',[EquipmentControoller::class,'alarmSystemUpdate'])->name('equipment-edit-alarm-system-view-process');

Route::post('equipment-inser-firefigthing-system',[EquipmentControoller::class,'fightingSystemInsert'])->name('equipment-inser-firefigthing-system');
Route::get('equipment-edit-firefigthing-view/{id}',[EquipmentControoller::class,'fireFightingEditView'])->name('equipment-edit-firefigthing-view');
Route::post('equipment-edit-firefigthing-view-process/{id}',[EquipmentControoller::class,'fireFightingEditViewUpdate'])->name('equipment-edit-firefigthing-view-process');


Route::post('equipment-insert-meansOfEscspe-system',[EquipmentControoller::class,'escapeInsert'])->name('equipment-insert-meansOfEscspe-system');
Route::get('equipment-edit-meansOfEscape-view/{id}',[EquipmentControoller::class,'escapeEditView'])->name('equipment-edit-meansOfEscape-view');
Route::post('equipment-edit-meansOfEscape-view-process/{id}',[EquipmentControoller::class,'escapeEditViewProcess'])->name('equipment-edit-meansOfEscape-view-process');

Route::get('others-setup',[EquipmentControoller::class,'othersView'])->name('others-setup');
Route::post('others-insert-drawings-process',[EquipmentControoller::class,'insertDrawings'])->name('others-insert-drawings-process');
Route::get('others-setup-drawings-view/{id}',[EquipmentControoller::class,'editDrawingsView'])->name('others-setup-drawings-view');
Route::post('others-setup-drawings-view-update-process/{id}',[EquipmentControoller::class,'updateDrawings'])->name('others-setup-drawings-view-update-process');

Route::post('others-insert-currency-process',[EquipmentControoller::class,'insertCurrency'])->name('others-insert-currency-process');
Route::get('others-edit-currency-view/{id}',[EquipmentControoller::class,'editCurrencyView'])->name('others-edit-currency-view');
Route::post('others-edit-currency-view-process/{id}',[EquipmentControoller::class,'editCurrencyProcess'])->name('others-edit-currency-view-process');

Route::get('building-setup-building',[EquipmentControoller::class,'buildingSetupView'])->name('building-setup-building');
Route::post('building-setup-insert-building-type-process',[EquipmentControoller::class,'insertBuildingType'])->name('building-setup-insert-building-type-process');
Route::get('building-setup-edit-building-type/{id}',[EquipmentControoller::class,'buildingTypeEditView'])->name('building-setup-edit-building-type');
Route::post('building-setup-edit-building-type-process/{id}',[EquipmentControoller::class,'updateBuildingType'])->name('building-setup-edit-building-type-process');

Route::post('building-setup-insert-construction-type-process',[EquipmentControoller::class,'insertConstructionType'])->name('building-setup-insert-construction-type-process');
Route::get('building-setup-edit-const-type/{id}',[EquipmentControoller::class,'constructionTypeEditView'])->name('building-setup-edit-const-type');
Route::post('building-setup-edit-const-type-post/{id}',[EquipmentControoller::class,'updateConstructionType'])->name('building-setup-edit-const-type-post');

/* End Main setup */

/*Service Setup*/
Route::get('Region',[ServiceController::class,'getRegionView'])->name('Region');
Route::post('add-region-process',[ServiceController::class,'addRegion'])->name('add-region-process');
Route::get('edit-region/{id}',[ServiceController::class,'getEditRegionView'])->name('edit-region');
Route::post('edit-region-process/{id}',[ServiceController::class,'editRegion'])->name('edit-region-process');


Route::get('District',[ServiceController::class,'getDistrictView'])->name('District');
Route::post('add-district-process',[ServiceController::class,'addDistrict'])->name('add-district-process');
Route::get('edit-district/{id}',[ServiceController::class,'getEditDistrictView'])->name('edit-district');
Route::post('edit-district-process/{id}',[ServiceController::class,'editDistrict'])->name('edit-district-process');
 
Route::get('Station',[ServiceController::class,'getStationView'])->name('Station');
Route::post('add-station-process',[ServiceController::class,'addStation'])->name('add-station-process');
Route::get('edit-station/{id}',[ServiceController::class,'getEditStationView'])->name('edit-station');
Route::post('edit-station-process/{id}',[ServiceController::class,'editStation'])->name('edit-station-process');

Route::get('rank-class',[ServiceController::class,'getRankClassView'])->name('rank-class');
Route::post('add-rank-class-process',[ServiceController::class,'addRankClass'])->name('add-rank-class-process');
Route::get('edit-rank-class/{id}',[ServiceController::class,'getEditRankClassView'])->name('edit-rank-class');
Route::post('edit-rank-class-process/{id}',[ServiceController::class,'editRankClass'])->name('edit-rank-class-process');

Route::get('rank',[ServiceController::class,'getRankView'])->name('rank');
Route::post('add-rank-process',[ServiceController::class,'addRank'])->name('add-rank-process');
Route::get('edit-rank/{id}',[ServiceController::class,'getEditRankView'])->name('edit-rank');
Route::post('edit-rank-process/{id}',[ServiceController::class,'editRank'])->name('edit-rank-process');

Route::get('department',[ServiceController::class,'getDepartmentView'])->name('department');
Route::post('add-department-process',[ServiceController::class,'addDepartment'])->name('add-department-process');
Route::get('edit-department/{id}',[ServiceController::class,'getEditDepartmentView'])->name('edit-department');
Route::post('edit-department-process/{id}',[ServiceController::class,'editDepartment'])->name('edit-department-process');

Route::get('unit',[ServiceController::class,'getUnitView'])->name('unit');
Route::post('add-unit-process',[ServiceController::class,'addUnit'])->name('add-unit-process');
Route::get('edit-unit/{id}',[ServiceController::class,'getEditUnitView'])->name('edit-unit');
Route::post('edit-unit-process/{id}',[ServiceController::class,'editUnit'])->name('edit-unit-process');

/* End Service Setup*/
 
//Get list of districts//
Route::get('findRegionData',[ServiceController::class,'findRegionData'])->name('findRegionData');
//end Get list of districts//


/* Finance setup */
Route::get('finance-setup-setup',[FinanceController::class,'index'])->name('finance-setup-setup');
Route::post('finance-setup-insert-type-process',[FinanceController::class,'insertBillTypeProcess'])->name('finance-setup-insert-type-process');
Route::get('finance-setup-edit-type-view/{id}',[FinanceController::class,'editBillTypeView'])->name('finance-setup-edit-type-view');
Route::post('finance-setup-edit-type-process/{id}',[FinanceController::class,'updateBillTypeProcess'])->name('finance-setup-edit-type-process');

Route::post('finance-setup-project-type-drop',[FinanceController::class,'getProjectType'])->name('finance-setup-project-type-drop');


Route::post('finance-setup-insert-bill',[FinanceController::class,'insertBillProcess'])->name('finance-setup-insert-bill');
Route::get('finance-setup-edit-bill-view/{id}',[FinanceController::class,'editBillView'])->name('finance-setup-edit-bill-view');
Route::post('finance-setup-edit-bill-process/{id}',[FinanceController::class,'updateBillProcess'])->name('finance-setup-edit-bill-process');

Route::get('finance-setup-application-forms',[FinanceController::class,'applicationFormView'])->name('finance-setup-application-forms');
Route::post('finance-setup-application-forms-process',[FinanceController::class,'insertAppicationFormProcess'])->name('finance-setup-application-forms-process');
Route::get('finance-setup-application-forms-edit-view/{id}',[FinanceController::class,'applicationFormEditView'])->name('finance-setup-application-forms-edit-view');
Route::post('finance-setup-application-forms-edit-view-process/{id}',[FinanceController::class,'updateAppicationFormProcess'])->name('finance-setup-application-forms-edit-view-process');

Route::get('finance-setup-sell-forms',[FinanceController::class,'sellFormsView'])->name('finance-setup-sell-forms');
Route::get('finance-setup-list-forms',[FinanceController::class,'listFormsView'])->name('finance-setup-list-forms');

Route::post('finance-setup-sell-forms-process',[FinanceController::class,'sellFormsProcess'])->name('finance-setup-sell-forms-process');

Route::get('finance-setup-sell-forms-print/{id}',[FinanceController::class,'printApplicationForm'])->name('finance-setup-sell-forms-print');


Route::get('make-payment-list',[FinanceController::class,'makePaymentList'])->name('make-payment-list');

Route::post('process-make-payment-fetch-info',[FinanceController::class,'getFormsInformations'])->name('process-make-payment-fetch-info');

Route::post('process-make-payment-process',[FinanceController::class,'processPaymentProcess'])->name('process-make-payment-process');
Route::post('search-make-payment-process',[FinanceController::class,'searchFomrsProcess'])->name('search-make-payment-process');

Route::get('form-type',[FinanceController::class,'applicationformtypeview'])->name('form-type');
Route::post('finance-setup-application-forms-type-process',[FinanceController::class,'addApplicationformtype'])->name('finance-setup-application-forms-type-process');
Route::get('edit-form-type/{id}',[FinanceController::class,'editapplicationformtypeview'])->name('edit-form-type');
Route::post('edit-finance-setup-application-forms-type-process/{id}',[FinanceController::class,'editApplicationformtype'])->name('edit-finance-setup-application-forms-type-process');


/* end Finance setup */


/*Regional Command*/
Route::get('RegionalCommander',[ServiceController::class,'getRegionalCommanderView'])->name('RegionalCommander');
Route::post('addRegionalCommander-process',[ServiceController::class,'addCommander'])->name('addRegionalCommander-process');
Route::get('ListCommanders',[ServiceController::class,'getListCommandersView'])->name('ListCommanders');
Route::get('BriefHistory',[ServiceController::class,'getBriefHistoryView'])->name('BriefHistory');
Route::get('get-commander-id/{id}', [ServiceController::class, 'getEditCommanderModalView'])->name('get-commander-id');
Route::get('get-id/{id}', [ServiceController::class, 'getEditRegionBriefModalView'])->name('get-id');
Route::post('edit-commander-process',[ServiceController::class,'editCommander'])->name('edit-commander-process');
Route::get('ListRegions',[ServiceController::class,'getListListRegionsView'])->name('ListRegions');
Route::post('edit-region-history-process',[ServiceController::class,'editRegHistory'])->name('edit-region-history-process');
Route::get('get-region-id/{id}', [ServiceController::class, 'getCommanderModalView'])->name('get-region-id');
Route::post('add-region-history-process',[ServiceController::class,'addRegHistory'])->name('add-region-history-process');
Route::get('view-commander/{id}', [ServiceController::class, 'getCommanderView'])->name('view-commander');
Route::get('view-region/{id}', [ServiceController::class, 'getRegionProfileView'])->name('view-region');
/* end Regional Command */

/*Task Manager */
Route::get('JobAssignment',[TaskMangerController::class,'getNewJobView'])->name('JobAssignment');
Route::get('get-certificate-id/{id}', [TaskMangerController::class, 'getCertificateModalView'])->name('get-certificate-id');
Route::get('get-permit-task-id/{id}', [TaskMangerController::class, 'getTaskModalView'])->name('get-permit-task-id');
Route::post('add-assign-task-process',[TaskMangerController::class,'assignTask'])->name('add-assign-task-process');
Route::post('add-reassign-task-process',[TaskMangerController::class,'ReassignTask'])->name('add-reassign-task-process');
Route::get('permit-task-assignment',[TaskMangerController::class,'getPermitTaskView'])->name('permit-task-assignment');
Route::get('get-permit-id/{id}', [TaskMangerController::class, 'getPermitModalView'])->name('get-permit-id');
Route::post('add-permit-task-process',[TaskMangerController::class,'assignPermitTask'])->name('add-permit-task-process');
Route::post('add-reassign-permit-task-process',[TaskMangerController::class,'ReassignPermitTask'])->name('add-reassign-permit-task-process');
Route::get('re_inspection_form/{id}', [TaskMangerController::class, 'getReInspectionFormView'])->name('re_inspection_form');
Route::get('permit-re_inspection_form/{id}', [TaskMangerController::class, 'getPermitReInspectionFormView'])->name('permit-re_inspection_form');
Route::post('add-authorize-process',[TaskMangerController::class,'addAuthorize'])->name('add-authorize-process');
Route::post('add-permit-authorize-process',[TaskMangerController::class,'addPermitAuthorize'])->name('add-permit-authorize-process');
Route::get('RegionalAssignment',[TaskMangerController::class,'getRegionalAssignmentView'])->name('RegionalAssignment');
Route::post('task.searchProcess', [TaskMangerController::class, 'searchProcess'])->name('task.searchProcess');
Route::get('get-app-id/{id}', [TaskMangerController::class, 'getAppIDView'])->name('get-app-id');
Route::post('add-assign-region-process', [TaskMangerController::class, 'addassignRegion'])->name('add-assign-region-process');
Route::get('JobTracker',[TaskMangerController::class,'getJobTrackerView'])->name('JobTracker');
Route::post('task.searchJobTrackerProcess', [TaskMangerController::class, 'JobTracker'])->name('task.searchJobTrackerProcess');
Route::get('view-job-tracker/{id}', [TaskMangerController::class, 'getJobTrackerDetailView'])->name('view-job-tracker');

/* end Task Manager */


// Impact Assessment
Route::get('impact-assessment',[ImpactController::class,'index'])->name('impact-assessment');
Route::post('impact.searchImpactAssessment', [ImpactController::class, 'searchImpactAssessment'])->name('impact.searchImpactAssessment');
Route::get('environmental-impact/{id}',[ImpactController::class,'environmentalView'])->name('environmental-impact');
Route::post('store-environmental-impact/{id}',[ImpactController::class,'storeEnvironmentalView'])->name('store-environmental-impact');
Route::get('neighbour-concerns/{id}',[ImpactController::class,'concernsView'])->name('neighbour-concerns');
Route::post('store-neighbour-concerns/{id}',[ImpactController::class,'storeConcerns'])->name('store-neighbour-concerns');
Route::get('impact-mgt/{id}',[ImpactController::class,'impactMgtView'])->name('impact-mgt');
Route::post('store-impact-mgt/{id}',action: [ImpactController::class,'storeImpactMgt'])->name('store-impact-mgt');
Route::get('view-app/{id}',[ImpactController::class,'viewApp'])->name('view-app');

/*Inspection Manager */
Route::get('Certificate',[CertificateController::class,'getCertificateView'])->name('Certificate');
Route::get('view-inspection-cert-details/{id}',[CertificateController::class,'getCertificateInspectionDetails'])->name('view-inspection-cert-details');
Route::post('add-floor-process',[CertificateController::class,'addFloor'])->name('add-floor-process');

Route::post('add-means-of-escape-process',[CertificateController::class,'addMeansOfescape'])->name('add-means-of-escape-process');
Route::post('add-fire-fighting-process',[CertificateController::class,'addfireFighting'])->name('add-fire-fighting-process');
Route::post('add-alarm-process',[CertificateController::class,'addAlarm'])->name('add-alarm-process');
Route::post('add-access-route-process',[CertificateController::class,'addAccessRoute'])->name('add-access-route-process');
Route::post('add-inspector-general-process',[CertificateController::class,'addInspectorGeneral'])->name('add-inspector-general-process');

Route::get('search-app',[CertificateController::class,'getSearchAppView'])->name('search-app');
Route::get('search-permit-app',[CertificateController::class,'getSearchPermitAppView'])->name('search-permit-app');
Route::post('inspection_manager.searchProcess', [CertificateController::class, 'searchProcess'])->name('inspection_manager.searchProcess');
Route::post('inspection_manager.searchProcessPermit', [CertificateController::class, 'searchProcessPermit'])->name('inspection_manager.searchProcessPermit');
Route::get('completed-inspection',[CertificateController::class,'getCompletedInspectionView'])->name('completed-inspection');
Route::post('add-change-request-process',[CertificateController::class,'addChangeRequest'])->name('add-change-request-process');
Route::get('Permit-Inspection',[CertificateController::class,'getPermitInspectionView'])->name('Permit-Inspection');
Route::get('view-inspection-permit-details/{id}',[CertificateController::class,'getPermitInspectionDetails'])->name('view-inspection-permit-details');
Route::post('add-permit-floor-process',[CertificateController::class,'addPermitFloor'])->name('add-permit-floor-process');
Route::post('add-permit-inspector-general-process',[CertificateController::class,'addPermitInspectorGeneral'])->name('add-permit-inspector-general-process');
Route::get('completed-permit-inspection',[CertificateController::class,'getCompletedPermitView'])->name('completed-permit-inspection');
Route::post('add-permit-change-request-process',[CertificateController::class,'addPermitChangeRequest'])->name('add-permit-change-request-process');
Route::get('ChangeRequest',[CertificateController::class,'getChangeRequestView'])->name('ChangeRequest');
Route::get('get-changerequest-id/{id}', [CertificateController::class, 'getChangeRequestModalView'])->name('get-changerequest-id');
Route::post('add-process-change-request-process',[CertificateController::class,'addProcessChangeRequest'])->name('add-process-change-request-process');
Route::get('approved-request',[CertificateController::class,'getapprovedRequestView'])->name('approved-request');
/* end Inspection Manager */

/* Task Manager */
Route::get('MyTask',[CertificateController::class,'getMyTaskView'])->name('MyTask');
Route::get('pending-permit-task-assignment',[CertificateController::class,'getPendingMyTaskView'])->name('pending-permit-task-assignment');
Route::get('completed-task',[CertificateController::class,'getCompletedTaskView'])->name('completed-task');
Route::get('completed-permit-task',[CertificateController::class,'getCompletedPermitTaskView'])->name('completed-permit-task');
Route::get('renewal-certificate-app',[CertificateController::class,'getRenewalApp'])->name('renewal-certificate-app');
Route::get('renewal-permit-app',[CertificateController::class,'getRenewalPermitApp'])->name('renewal-permit-app');
Route::get('Renewal-Assignment',[CertificateController::class,'getRenewalAssignmentView'])->name('Renewal-Assignment');
Route::get('Permit-Renewal-Assignment',[CertificateController::class,'getPermitRenewalAssignmentView'])->name('Permit-Renewal-Assignment');

/* End Task Manager */
 
 /* Renewal Manager */

 /* End Renewal Manager */
 Route::get('sell_renewal',[RenewalController::class,'getSellRenewalFormView'])->name('sell_renewal');
 Route::get('add_question',[RenewalController::class,'getAddQtnView'])->name('add_question');
 Route::post('add-question-process',[RenewalController::class,'addQuestion'])->name('add-question-process');
 Route::get('edit-question/{id}',[RenewalController::class,'getEditQuestionView'])->name('edit-question');
 Route::post('edit-question-process/{id}',[RenewalController::class,'editQuestion'])->name('edit-question-process');
 Route::get('QuestionType',[RenewalController::class,'getQtnTypeView'])->name('QuestionType');
 Route::post('add-question-type-process',[RenewalController::class,'addQuestionType'])->name('add-question-type-process');
 Route::get('edit-question-type/{id}',[RenewalController::class,'editQuestionTypeView'])->name('edit-question-type');
 Route::post('edit-question-type-process/{id}',[RenewalController::class,'editQuestionType'])->name('edit-question-type-process');
 Route::get('re-inspection',[RenewalController::class,'getReInspectionView'])->name('re-inspection');
 Route::get('view-re-inspection-cert-report/{id}',[RenewalController::class,'getReInspectionReportView'])->name('view-re-inspection-cert-report');
 Route::post('add-re-inspection-process',[RenewalController::class,'addReInspection'])->name('add-re-inspection-process');
 Route::post('add-re-inspection-section-two-process',[RenewalController::class,'addReInspectionSectionTwo'])->name('add-re-inspection-section-two-process');
 Route::get('permit-re-inspection',[RenewalController::class,'getPermitReInspectionView'])->name('permit-re-inspection');
 Route::get('view-permit-re-inspection-cert-report/{id}',[RenewalController::class,'getPermitReInspectionReportView'])->name('view-permit-re-inspection-cert-report');
 Route::post('add-permit-re-inspection-process',[RenewalController::class,'addPermitReInspection'])->name('add-permit-re-inspection-process');
 Route::post('add-permit-re-inspection-section-two-process',[RenewalController::class,'addPermitReInspectionSectionTwo'])->name('add-permit-re-inspection-section-two-process');
 Route::get('renewal_list',[RenewalController::class,'getRenewalCertificateView'])->name('renewal_list');
 Route::get('renew_cert_form/{id}',[RenewalController::class,'getRenewCertView'])->name('renew_cert_form');
 Route::post('add-certificate-renewal-process',[RenewalController::class,'addCertRenewal'])->name('add-certificate-renewal-process');
Route::get('permit-renewal_list',[RenewalController::class,'getRenewalPermitView'])->name('permit-renewal_list');
Route::get('renew_permit_form/{id}',[RenewalController::class,'getRenewPermitView'])->name('renew_permit_form');
Route::post('add-permit-renewal-process',[RenewalController::class,'addPermitRenewal'])->name('add-permit-renewal-process');

/* Complete Application  */

Route::get('application-forms-search',[ApplicationManagerController::class,'completeApplicationFormsView'])->name('application-forms-search');
Route::post('application-forms-search-process',[ApplicationManagerController::class,'searchFomrsProcess'])->name('application-forms-search-process');


Route::get('application-open-certificate-forms/{id}',[ApplicationManagerController::class,'openCertificateForm'])->name('application-open-certificate-forms');
Route::post('application-open-certificate-forms-insert-process',[ApplicationManagerController::class,'addCertificateApplication'])->name('application-open-certificate-forms-insert-process');
Route::get('application-edit-certificate-forms/{id}',[ApplicationManagerController::class,'editCertificateForm'])->name('application-edit-certificate-forms');
Route::post('application-open-certificate-forms-update-process',[ApplicationManagerController::class,'updateCertificateApplication'])->name('application-open-certificate-forms-update-process');


Route::get('application-attach-drawings',[ApplicationManagerController::class,'attachDrawingsList'])->name('application-attach-drawings');
Route::post('application-attach-drawings-get-forms',[ApplicationManagerController::class,'getAttachDrawingForms'])->name('application-attach-drawings-get-forms');

Route::post('application-attach-drawings-get-forms-process',[ApplicationManagerController::class,'uploadAttachDrawingsProcess'])->name('application-attach-drawings-get-forms-process');

Route::post('get-district',[ApplicationManagerController::class,'getDistricts'])->name('get-district');
Route::post('get-business-type-drop',[ApplicationManagerController::class,'getBusinessType'])->name('get-business-type-drop');

Route::get('application-open-permit-forms/{id}',[ApplicationManagerController::class,'openPermitForm'])->name('application-open-permit-forms');
Route::post('application-open-permit-forms-insert-process',[ApplicationManagerController::class,'addPermitApplication'])->name('application-open-permit-forms-insert-process');
Route::get('application-edit-permit-forms/{id}',[ApplicationManagerController::class,'editPermitForm'])->name('application-edit-permit-forms');
Route::post('application-edit-permit-forms-process',[ApplicationManagerController::class,'updatePermitApplication'])->name('application-edit-permit-forms-process');
/* Complete Application  */


/* Bill payment  */
Route::get('billPayment-generate-bill',[BillPaymentController::class,'index'])->name('billPayment-generate-bill');
Route::post('billPayment-forms-search-process',[BillPaymentController::class,'searchFomrsProcess'])->name('billPayment-forms-search-process');

Route::get('billPayment-print-bill/{id}',[BillPaymentController::class,'printBillView'])->name('billPayment-print-bill');

Route::get('finance',[BillPaymentController::class,'financeView'])->name('finance');
Route::post('finance-forms-search-process',[BillPaymentController::class,'searchFomrs'])->name('finance-forms-search-process');
Route::get('finance-view-financials/{id}',[BillPaymentController::class,'viewFinancials'])->name('finance-view-financials');
Route::get('payment-print-bill/{id}',[BillPaymentController::class,'printPaymentView'])->name('payment-print-bill');

/* End Bill payment  */



/* Reports  */
Route::get('reports-sales-satistic',[ReportsController::class,'salesSatisticReportView'])->name('reports-sales-satistic');
Route::post('reports-sales-satistic-general-process',[ReportsController::class,'salesSatisticReportProcess'])->name('reports-sales-satistic-general-process');
Route::post('reports-sales-year-general-process',[ReportsController::class,'salesYearReportProcess'])->name('reports-sales-year-general-process');

Route::get('reports-sales-national',[ReportsController::class,'nationSaleReportView'])->name('reports-sales-national');
Route::post('reports-national-sales-process',[ReportsController::class,'nationalSalesReportProcess'])->name('reports-national-sales-process');

Route::get('report-nation-form-list/{formID}/{regionID}',[ReportsController::class,'nationalFormListView'])->name('report-nation-form-list');
Route::post('reports-national-regional-process',[ReportsController::class,'nationalRegionalReportProcess'])->name('reports-national-regional-process');


Route::get('reports-application-sales',[ReportsController::class,'applicationSaleReportView'])->name('reports-application-sales');
Route::post('reports-application-sales-process',[ReportsController::class,'applicationReportProcess'])->name('reports-application-sales-process');

Route::get('reports-assignment-report',[ReportsController::class,'assignmentReportView'])->name('reports-assignment-report');
Route::post('reports-assignment-report-process',[ReportsController::class,'assignmentReportProcess'])->name('reports-assignment-report-process');


Route::get('reports-turnover-report',[ReportsController::class,'turnOverReportView'])->name('reports-turnover-report');
Route::post('reports-turnovercertificate-year-general-process',[ReportsController::class,'certificateYearReportProcess'])->name('reports-turnovercertificate-year-general-process');

Route::get('reports-turnover-list-application-view/{regionID}/{year}/{formID}',[ReportsController::class,'turnAroundListApplicationView'])->name('reports-turnover-list-application-view');
Route::get('reports-turnover-list-tracker-view/{regionID}/{year}/{activity}',[ReportsController::class,'turnAroundListTrackerView'])->name('reports-turnover-list-tracker-view');

Route::post('reports-turnoverpermit-year-general-process',[ReportsController::class,'permitYearReportProcess'])->name('reports-turnoverpermit-year-general-process');
Route::get('reports-turnover-list-permits-view/{regionID}/{year}',[ReportsController::class,'turnAroundListPermitView'])->name('reports-turnover-list-permits-view');
/* End Reports  */

/* Review Manager */
Route::get('process_certificate',[ReviewController::class,'getProcessCertificateView'])->name('process_certificate');
Route::post('add-review-process',[ReviewController::class,'reviewCertificate'])->name('add-review-process');
Route::post('declined-review-process',[ReviewController::class,'reviewCertificateDecline'])->name('declined-review-process');
Route::get('view-application-cert-details/{id}',[ReviewController::class,'getProcessCertificateDetailsView'])->name('view-application-cert-details');
Route::get('process_permit',[ReviewController::class,'getProcessPermitView'])->name('process_permit');
Route::get('view-application-permit-details/{id}',[ReviewController::class,'getProcessPermitDetailsView'])->name('view-application-permit-details');
Route::post('add-review-permit-process',[ReviewController::class,'reviewPermit'])->name('add-review-permit-process');
Route::post('declined-review-permit-process',[ReviewController::class,'reviewPermitDecline'])->name('declined-review-permit-process');
Route::get('review_certificate',[ReviewController::class,'getReviewCertificate'])->name('review_certificate');
Route::get('vet_application_cert_details/{id}',[ReviewController::class,'getReviewVetCertificate'])->name('vet_application_cert_details');
Route::post('add-certreview-process', [ReviewController::class, 'ProcessCertReviewApproval'])->name('add-certreview-process');
Route::get('review_permit',[ReviewController::class,'getReviewPermit'])->name('review_permit');
Route::get('review_permit_application/{id}',[ReviewController::class,'getReviewVetPermit'])->name('review_permit_application');
Route::post('add-permitreview-process', [ReviewController::class, 'ProcessPermitReviewApproval'])->name('add-permitreview-process');
Route::get('vet_certificate',[ReviewController::class,'getVetCertificate'])->name('vet_certificate');
Route::get('view-review_permit_application/{id}',[ReviewController::class,'getReviewPermitReport'])->name('view-review_permit_application');
Route::get('vet_permit',[ReviewController::class,'getVetPermit'])->name('vet_permit');
Route::get('InspectionReportPermit/{id}',[ReviewController::class,'getReviewVetPermitReport'])->name('InspectionReportPermit');
Route::get('approve_certificate',[ReviewController::class,'getApproveCertificateView'])->name('approve_certificate');
Route::get('approve_application_cert_details/{id}',[ReviewController::class,'getApproveCertDetailsView'])->name('approve_application_cert_details');
Route::post('add-certificate-approval-process',[ReviewController::class,'addApproveCertificate'])->name('add-certificate-approval-process');
Route::get('approve_permit',[ReviewController::class,'getApprovePermitView'])->name('approve_permit');

Route::get('approve_application_permit_details/{id}',[ReviewController::class,'getApprovePermitDetailsView'])->name('approve_application_permit_details');
Route::post('approve-permit-review-processs',[ReviewController::class,'addApprovePermit'])->name('approve-permit-review-process');
Route::get('search-permit-application',[ReviewController::class,'getSearchPermitView'])->name('search-permit-application');
Route::post('review_manager.searchPermitProcess', [ReviewController::class, 'searchPermitProcess'])->name('review_manager.searchPermitProcess');
Route::get('search-cert-application',[ReviewController::class,'getSearchCertView'])->name('search-cert-application');
Route::post('review_manager.searchCertProcess', [ReviewController::class, 'searchCertProcess'])->name('review_manager.searchCertProcess');
 
/* End Review Manager */


/* Issuance Manager */
Route::get('Print-Certificate',[IssuanceController::class,'getPrintCertificateView'])->name('Print-Certificate');
Route::get('print_application_cert_details/{id}',[IssuanceController::class,'getPrintApplicationCertView'])->name('print_application_cert_details');
Route::get('Issue-Certificate',[IssuanceController::class,'getIssueCertificateView'])->name('Issue-Certificate');
Route::post('add-issue-cert-process',[IssuanceController::class,'addIssueCert'])->name('add-issue-cert-process');
Route::get('Issue-Permit',[IssuanceController::class,'getIssuePermitView'])->name('Issue-Permit');
Route::post('add-issue-permit-process',[IssuanceController::class,'addIssuePermit'])->name('add-issue-permit-process');

/* End Issuance Manager */

/* Incident Manager */

Route::get('Setup',[IncidentController::class,'getClassificationView'])->name('Setup');
Route::post('add-incident-class-process',[IncidentController::class,'addIncidentClass'])->name('add-incident-class-process');
Route::get('edit-incident-class/{id}',[IncidentController::class,'getEditClassificationView'])->name('edit-incident-class');
Route::post('edit-incident-class-process/{id}',[IncidentController::class,'getEditClassification'])->name('edit-incident-class-process');
Route::get('incident-category',[IncidentController::class,'getCategoryView'])->name('incident-category');
Route::post('add-incident-cat-process',[IncidentController::class,'addIncidentCategory'])->name('add-incident-cat-process');
Route::get('edit-incident-category/{id}',[IncidentController::class,'getEditCategoryView'])->name('edit-incident-category');
Route::get('incident-type',[IncidentController::class,'getIncidentTypeView'])->name('incident-type');
Route::post('edit-incident-cat-process/{id}',[IncidentController::class,'EditIncidentCategory'])->name('edit-incident-cat-process');
Route::post('add-incident-type-process',[IncidentController::class,'addIncidentType'])->name('add-incident-type-process');
Route::get('edit-incident-type/{id}',[IncidentController::class,'getEditTypeView'])->name('edit-incident-type');
Route::post('edit-incident-type-process/{id}',[IncidentController::class,'EditIncidentType'])->name('edit-incident-type-process');
Route::get('Add-Incident',[IncidentController::class,'getIncidentView'])->name('Add-Incident');
Route::post('add-incident-process',[IncidentController::class,'addIncident'])->name('add-incident-process');
Route::get('findTypeData',[IncidentController::class,'findTypeData'])->name('findTypeData');
Route::get('edit-incident/{id}',[IncidentController::class,'getEditIncidentView'])->name('edit-incident');
Route::post('edit-incident-process/{id}',[IncidentController::class,'editIncident'])->name('edit-incident-process');
 
Route::get('incident_manager/incidentimage/delete/{id}', [IncidentController::class, 'destroy_image']); 
Route::get('ManageIncident',[IncidentController::class,'getManageIncidentView'])->name('ManageIncident');
Route::get('get-incident-id/{id}', [IncidentController::class, 'getIcidentID'])->name('get-incident-id');
Route::post('add-assign-incident-process',[IncidentController::class,'AssignIncident'])->name('add-assign-incident-process');
Route::get('get-task-id/{id}', [IncidentController::class, 'getTaskModalView'])->name('get-task-id');
Route::post('add-reassign-incident-process',[IncidentController::class,'ReassignIncident'])->name('add-reassign-incident-process');
Route::get('IncidentReport',[IncidentController::class,'getReportIncidentView'])->name('IncidentReport');
Route::get('get-incidenttask-id/{id}', [IncidentController::class, 'getIncidentTypeID'])->name('get-incidenttask-id');
Route::post('add-incident-report-process',[IncidentController::class,'addIncidentReport'])->name('add-incident-report-process');
Route::get('Incident-Report',[ReportsController::class,'getIncidentReportView'])->name('Incident-Report');
Route::get('incident-details-report/{id}',[ReportsController::class,'getIncidentReportDetailsView'])->name('incident-details-report');
Route::get('view-details-incident-report/{id}', [ReportsController::class, 'getIncidentReportId'])->name('view-details-incident-report');
Route::get('incident-type-details-report/{id}',[ReportsController::class,'getIncidentReportTypeDetailsView'])->name('incident-type-details-report');
Route::get('incident-reg-details-report/{id}',[ReportsController::class,'getIncidentReportRegionDetailsView'])->name('incident-reg-details-report');

/* End Incident Manaer */

/* Registration Form */
Route::get('search-form',[RegistrationController::class,'getRegistrationFormView'])->name('search-form');
Route::post('registration-forms-search-process',[RegistrationController::class,'searchFomrsProcess'])->name('registration-forms-search-process');
Route::get('registration-open-permit-forms/{id}',[RegistrationController::class,'openPermitForm'])->name('registration-open-permit-forms');
Route::post('registration/add-permit-registration-form-application-process',[RegistrationController::class,'addPermitApplication'])->name('registration.add-permit-registration-form-application-process');
Route::get('registration/permit-registration-form-project',[RegistrationController::class,'openPermitProjectView'])->name('permit-registration-form-project');
Route::post('registration/add-permit-registration-form-project-process',[RegistrationController::class,'addPermitProject'])->name('registration.add-permit-registration-form-project-process');
Route::get('registration/permit-registration-form-infrastructure',[RegistrationController::class,'openPermitInfrastructureView'])->name('registration.permit-registration-form-infrastructure');
Route::get('registration/permit-registration-form-application/{id}',[RegistrationController::class,'openPermitApplicationView'])->name('registration.permit-registration-form-application');
Route::get('registration/permit-registration-form-project',[RegistrationController::class,'getStep2Back'])->name('registration.permit-registration-form-project');
Route::get('registration/permit-registration-form-app',[RegistrationController::class,'getStep1Back'])->name('registration.permit-registration-form-app');
Route::post('registration/add-permit-registration-form-app-process',[RegistrationController::class,'addPermitApp'])->name('registration.add-permit-registration-form-app-process');
Route::post('registration/add-permit-registration-form-infrastructure-process',[RegistrationController::class,'addPermitInfrastructure'])->name('registration.add-permit-registration-form-infrastructure-process');
Route::get('registration/permit-registration-form-declaration',[RegistrationController::class,'openPermitDeclarationView'])->name('registration.permit-registration-form-declaration');
Route::get('registration/permit-registration-form-infrastructure',[RegistrationController::class,'getStep3Back'])->name('registration.permit-registration-form-infrastructure');
Route::post('registration/add-permit-registration-form-declaration-process',[RegistrationController::class,'addDeclaration'])->name('registration.add-permit-registration-form-declaration-process');
Route::get('registration/MyApplication',[RegistrationController::class,'getApplicationView'])->name('MyApplication');
Route::get('registration/view-application/{id}',[RegistrationController::class,'viewApplication'])->name('registration.view-application');
Route::get('registration/resume/{id}',[RegistrationController::class,'Resume'])->name('registration.resume');
Route::get('registration/edit-permit-registration-form-application/{id}',[RegistrationController::class,'openEditPermitApplicationView'])->name('registration.edit-permit-registration-form-application');
Route::post('registration/edit-permit-registration-form-application-process/{id}',[RegistrationController::class,'editPermitApplication'])->name('registration.edit-permit-registration-form-application-process');
Route::get('registration/edit-permit-registration-form-project/{id}',[RegistrationController::class,'openEditPermitProjectView'])->name('registration.edit-permit-registration-form-project');
Route::post('registration/edit-permit-registration-form-project-process/{id}',[RegistrationController::class,'editPermitProject'])->name('registration.edit-permit-registration-form-project-process');
Route::get('registration/edit-permit-registration-form-infrastructure/{id}',[RegistrationController::class,'openEditPermitInfrastructureView'])->name('registration.edit-permit-registration-form-infrastructure');
Route::post('registration/edit-permit-registration-form-infrastructure-process/{id}',[RegistrationController::class,'editInfrastructure'])->name('registration.edit-permit-registration-form-infrastructure-process');
Route::get('registration/edit-permit-registration-form-declaration/{id}',[RegistrationController::class,'openEditPermitDeclarationView'])->name('registration.edit-permit-registration-form-declaration');
Route::post('registration/edit-permit-registration-form-declaration-process/{id}',[RegistrationController::class,'editDeclaration'])->name('registration.edit-permit-registration-form-declaration-process');
Route::get('registration/DocumentAttachment',[RegistrationController::class,'getAttachedDocView'])->name('DocumentAttachment');
Route::get('findProjectTypeyData',[RegistrationController::class,'findProjectTypeyData'])->name('findProjectTypeyData');
/* End Registration Form */

/* Screening */
Route::get('application-screening/{id}',[TaskMangerController::class,'getAppScreeningView'])->name('application-screening');
Route::get('viewScreening/{id}',[TaskMangerController::class,'getViewScreening'])->name('viewScreening');
Route::post('add-permit-screening-process',[TaskMangerController::class,'addScreening'])->name('add-permit-screening-process');
Route::post('add-permit-review-process',[ReviewController::class,'addReview'])->name('add-permit-review-process');
/* End of Screening */

//Customer Routes
Route::get('/customer/application',[RegController::class,'getApplicationView'])->name('customer-application');
Route::get('/customer/view-application/{id}',[RegController::class,'viewApplication'])->name('customer.view-application');
Route::get('/customer/registration/edit-permit-registration-form-application/{id}',[RegController::class,'openEditPermitApplicationView'])->name('customer.registration.edit-permit-registration-form-application');
Route::post('/customer/registration/edit-permit-registration-form-application-process/{id}',[RegController::class,'editPermitApplication'])->name('customer.registration.edit-permit-registration-form-application-process');
Route::get('/customer/registration/edit-permit-registration-form-project/{id}',[RegController::class,'openEditPermitProjectView'])->name('customer.registration.edit-permit-registration-form-project');
Route::post('/customer/registration/edit-permit-registration-form-project-process/{id}',[RegController::class,'editPermitProject'])->name('customer.registration.edit-permit-registration-form-project-process');
Route::get('/customer/registration/resume/{id}',[RegController::class,'Resume'])->name('customer.registration.resume');
Route::get('/customer-login',[AuthController::class,'index'])->name('customer-login');
Route::post('/customer-authentication-process',[AuthController::class,'customerAuthenticationProcess'])->name('customer-authentication-process');
Route::post('/customer-buy-forms-process',[ApplicationController::class,'buyFormsProcess'])->name('customer-buy-forms-process');
Route::post('/customer-logout-authentication-process',[AuthController::class,'customerLogoutAuthenticationProcess'])->name('customer-logout-authentication-process');
Route::get('/customer-dashboard',[CustomerDashboardController::class,'dashboardView'])->name('customer-dashboard');
Route::get('/customer-track-application',[ApplicationController::class,'trackApplicationView'])->name('customer-track-application');
Route::get('/customer-job-details/{id}',[ApplicationController::class,'jobDetails'])->name('customer-job-details');
Route::get('customer-user-guide',[CustomerDashboardController::class,'userGuideView'])->name('customer-user-guide');
Route::get('/customer-new-ticket',[EnquiriesController::class,'newTicketView'])->name('customer-new-ticket');
Route::get('/customer-enquiries',[EnquiriesController::class,'enquiriesView'])->name('customer-enquiries');
Route::post('/customer-enquiries-submit',[EnquiriesController::class,'store'])->name('customer-enquiries-submit');
Route::get('/customer/attach-document',[ApplicationController::class,'getAttachedDocView'])->name('customer-attach-document');
Route::post('/customer/application-attach-drawings-get-forms',[ApplicationController::class,'getAttachDrawingForms'])->name('customer-application-attach-drawings-get-forms');
Route::post('/customer/application-attach-drawings-get-forms-process',[ApplicationController::class,'uploadAttachDrawingsProcess'])->name('customer-application-attach-drawings-get-forms-process');
Route::get('/customer/registration/edit-permit-registration-form-infrastructure/{id}',[RegController::class,'openEditPermitInfrastructureView'])->name('customer.registration.edit-permit-registration-form-infrastructure');
Route::post('/customer/registration/edit-permit-registration-form-infrastructure-process/{id}',[RegController::class,'editInfrastructure'])->name('customer.registration.edit-permit-registration-form-infrastructure-process');
Route::get('/customer/registration/edit-permit-registration-form-declaration/{id}',[RegController::class,'openEditPermitDeclarationView'])->name('customer.registration.edit-permit-registration-form-declaration');
Route::post('/customer/registration/edit-permit-registration-form-declaration-process/{id}',[RegController::class,'editDeclaration'])->name('customer.registration.edit-permit-registration-form-declaration-process');

Route::get('customerFindRegionData',[RegController::class,'customerFindRegionData'])->name('customerFindRegionData');
Route::get('customerFindCategoryData',[RegController::class,'customerFindCategoryData'])->name('customerFindCategoryData');
Route::get('customerFindProjectTypeyData',[RegController::class,'customerFindProjectTypeyData'])->name('customerFindProjectTypeyData');
Route::get('customer-buy-form',[ApplicationController::class,'customerBuyForm'])->name('customer-buy-form');
Route::post('customer-finance-setup-sell-forms-process',[ApplicationController::class,'sellFormsProcess'])->name('customer-finance-setup-sell-forms-process');

Route::get('customer-finance',[CustomerFinanceController::class,'financeView'])->name('customer-finance');
Route::get('customer-bill-details/{id}',[CustomerFinanceController::class,'billDetailsView'])->name('customer-bill-details');
Route::get('customer-payment-details/{id}',[CustomerFinanceController::class,'paymentDetailsView'])->name('customer-payment-details');
Route::get('customer-download-receipt/{id}',[CustomerFinanceController::class,'downloadReceiptView'])->name('customer-download-receipt');

Route::get('customer-permits',[CustomerPermitController::class,'getPrintCertificateView'])->name('customer-permits');
Route::get('customer-print-application-cert-details/{id}',[CustomerPermitController::class,'getPrintApplicationCertView'])->name('customer-print-application-cert-details');

Route::get('customer-impact-assessment',[ImpactAssessmentController::class,'index'])->name('customer-impact-assessment');
Route::get('customer-environmental-impact/{id}',[ImpactAssessmentController::class,'environmentalView'])->name('customer-environmental-impact');
Route::post('customer-store-environmental-impact/{id}',[ImpactAssessmentController::class,'storeEnvironmentalView'])->name('customer-store-environmental-impact');
Route::get('customer-neighbour-concerns/{id}',[ImpactAssessmentController::class,'concernsView'])->name('customer-neighbour-concerns');
Route::post('customer-store-neighbour-concerns/{id}',[ImpactAssessmentController::class,'storeConcerns'])->name('customer-store-neighbour-concerns');
Route::get('customer-impact-mgt/{id}',[ImpactAssessmentController::class,'impactMgtView'])->name('customer-impact-mgt');
Route::post('customer-store-impact-mgt/{id}',[ImpactAssessmentController::class,'storeImpactMgt'])->name('customer-store-impact-mgt');
Route::get('customerviewapp/{id}',[ImpactAssessmentController::class,'viewApplication'])->name('customerviewapp');


/*Staff Management */
Route::get('create-staff',[StaffController::class,'addStaff'])->name('create-staff');

 Route::get('list-staff',[StaffController::class,'listStaffView'])->name('list-staff');
 Route::get('editstaff/{staff_id}',[StaffController::class,'EdittaffView'])->name('editstaff');
 Route::post('edit-staff-process/{staff_id}',[StaffController::class,'updateStaff'])->name('edit-staff-process');
 Route::post('edit-staff-process2/{staff_id}',[StaffController::class,'updateStaff2'])->name('edit-staff-process2');
 Route::post('edit-staff-process3/{staff_id}',[StaffController::class,'updateStaff3'])->name('edit-staff-process3');
   Route::post('edit-bank-details/{staff_id}',[StaffController::class,'updateBankDetails'])->name('edit-bank-details');

  Route::get('staff-record',[StaffController::class,'staffRecordView'])->name('staff-record');
   Route::post('create-staff-document-process',[StaffController::class,'saveStaffDocument'])->name('create-staff-document-process');
      Route::post('create-bank-details-process',[StaffController::class,'saveBankDetails'])->name('create-bank-details-process');
   Route::post('edit-staff-document-process',[StaffController::class,'editStaffDocument'])->name('edit-staff-document-process');

 
 Route::get('staff-upload-image/{staff_id}',[StaffController::class,'uploadStaffPhotoView'])->name('staff-upload-image');
 Route::post('create-staff-photo-process',[StaffController::class,'saveStaffPhoto'])->name('create-staff-photo-process');
 Route::post('upload-staff-supervisor-process',[StaffController::class,'updateStaffSup'])->name('upload-staff-supervisor-process');
 //Route::get('staff-upload-image/',[StaffController::class,'uploadStaffView2'])->name('staff-upload-image');
 Route::get('staff-profile/{staff_id}', [StaffController::class, 'viewStaffProfile'])->name('staff-profile');
 Route::get('next-of-kin', [StaffController::class, 'viewStaffNextKin'])->name('next-of-kin');
 Route::post('staff_management.searchProcess', [StaffController::class, 'searchProcess'])->name('staff_management.searchProcess');

 Route::get('next-of-kin-get-id/{staff_id}', [StaffController::class, 'StaffNextofKinModalView'])->name('next-of-kin-get-id');
 //Route::get('add-staff-next-kin/{staff_id}', [StaffController::class, 'addStaffNextofKinModalView'])->name('add-staff-next-kin');
 
 Route::post('next-of-kin-process', [StaffController::class, 'ProcessStaffNextofKin'])->name('next-of-kin-process');
 

Route::get('create-staff-category',[StaffController::class,'CategoryView'])->name('create-staff-category');
Route::post('create-staff-category-process',[StaffController::class,'createCategory'])->name('create-staff-category-process');
Route::get('edit-staff-category/{id}',[StaffController::class,'editCategoryView'])->name('edit-staff-category');
Route::post('edit-staff-category-process/{id}',[StaffController::class,'updatestaffCategory'])->name('edit-staff-category-process');
Route::get('delete-staff-category/{id}', [StaffController::class, 'deleteStaffCategory'])->name('delete-staff-category');

Route::post('create-staff-class-process',[StaffController::class,'createClassification'])->name('create-staff-class-process');
Route::get('edit-staff-class/{id}',[StaffController::class,'editClassView'])->name('edit-staff-class');
Route::post('edit-staff-class-process/{id}',[StaffController::class,'updatestaffClass'])->name('edit-staff-class-process');
Route::get('delete-staff-class/{id}', [StaffController::class, 'deleteStaffClass'])->name('delete-staff-class');

Route::post('create-staff-type-process',[StaffController::class,'createType'])->name('create-staff-type-process');
Route::get('edit-staff-type/{id}',[StaffController::class,'editTypeView'])->name('edit-staff-type');
Route::post('edit-staff-type-process/{id}',[StaffController::class,'updatestaffType'])->name('edit-staff-type-process');
Route::get('delete-staff-type/{id}', [StaffController::class, 'deleteStaffType'])->name('delete-staff-type');

//Document Category
Route::post('create-document-category-process',[StaffController::class,'createDocCategory'])->name('create-document-category-process');
Route::get('edit-document-category/{id}',[StaffController::class,'editDocCategoryView'])->name('edit-document-category');
Route::post('edit-document-category-process/{id}',[StaffController::class,'updateDocCategory'])->name('edit-document-category-process');
Route::get('delete-document-category/{id}', [StaffController::class, 'deleteDocCategory'])->name('delete-document-category');

//Document Type
Route::post('create-document-type-process',[StaffController::class,'createDocType'])->name('create-document-type-process');
Route::get('edit-document-type/{id}',[StaffController::class,'editDocTypeView'])->name('edit-document-type');
Route::post('edit-document-type-process/{id}',[StaffController::class,'updateDocType'])->name('edit-document-type-process');
Route::get('delete-document-type/{id}', [StaffController::class, 'deleteDocType'])->name('delete-document-type');
/*Staff Management */

// Leave Setup
Route::get('create-leave-setup',[LeaveSetupController::class,'leaveSetupView'])->name('create-leave-setup');
Route::post('create-leave-category-process',[LeaveSetupController::class,'createCategory'])->name('create-leave-category-process');
Route::get('edit-leave-category/{id}',[LeaveSetupController::class,'editCategoryView'])->name('edit-leave-category');
Route::post('edit-leave-category-process/{id}',[LeaveSetupController::class,'updateLeaveCategory'])->name('edit-leave-category-process');
Route::get('delete-leave-category/{id}', [LeaveSetupController::class, 'deleteLeaveCategory'])->name('delete-leave-category');

Route::post('create-leave-type-process',[LeaveSetupController::class,'createLeaveType'])->name('create-leave-type-process');
Route::get('edit-leave-type/{id}',[LeaveSetupController::class,'editLeaveTypeView'])->name('edit-leave-type');
Route::post('edit-leave-type-process/{id}',[LeaveSetupController::class,'updateLeaveType'])->name('edit-leave-type-process');
Route::get('delete-leave-type/{id}', [LeaveSetupController::class, 'deleteLeaveType'])->name('delete-leave-type');

// Route::post('create-leave-type-setup-process',[LeaveSetupController::class,'createLeaveTypeSetup'])->name('create-leave-type-setup-process');
// Route::get('edit-leave-type-setup/{id}',[LeaveSetupController::class,'editLeaveTypeSetupView'])->name('edit-leave-type-setup');
// Route::post('edit-leave-type-setup-process/{id}',[LeaveSetupController::class,'updateLeaveTypeSetup'])->name('edit-leave-type-setup-process');
// Route::get('delete-leave-type-setup/{id}', [LeaveSetupController::class, 'deleteLeaveTypeSetup'])->name('delete-leave-type-setup');
Route::get('get-holidays',[HolidaySetupController::class,'getHolidays'])->name('get-holidays');
Route::post('create-holiday-process',[HolidaySetupController::class,'createHoliday'])->name('create-holiday-process');
Route::get('edit-holiday/{id}',[HolidaySetupController::class,'editHoliday'])->name('edit-holiday');
Route::post('edit-holiday-process/{id}',[HolidaySetupController::class,'updateHoliday'])->name('edit-holiday-process');
Route::get('delete-holiday/{id}', [HolidaySetupController::class, 'deleteHoliday'])->name('delete-holiday');

Route::get('findLeaveTypeData',[LeaveSetupController::class,'findLeaveTypeData'])->name('findLeaveTypeData');
Route::get('findLeaveDays',[LeaveSetupController::class,'findLeaveDays'])->name('findLeaveDays');

//Leave Application
Route::get('leave-application',[LeaveApplicationController::class,'index'])->name('leave-application');
Route::post('leave.searchLeaveApplicant', [LeaveApplicationController::class, 'searchLeaveApplicant'])->name('leave.searchLeaveApplicant');
Route::post('commence-application',[LeaveApplicationController::class,'commenceApplication'])->name('commence-application');
Route::post('commence-application-process',[LeaveApplicationController::class,'commenceApplicationProcess'])->name('commence-application-process');

//Leave Approval
Route::get('leave-approval',[LeaveApplicationController::class,'leaveApprovalView'])->name('leave-approval');
Route::post('leave-approval-process',[LeaveApplicationController::class,'leaveApprovalProcess'])->name('leave-approval-process');

//Leave Resumption
Route::post('leave-resumption-process',[LeaveApplicationController::class,'leaveResumptionProcess'])->name('leave-resumption-process');
 
 Route::get('fetch-leave-details/{staff_id}',[LeaveApplicationController::class,'fetchLeaveDetails'])->name('fetch-leave-details');

 // Firm Setup
Route::get('firm-setup',[FirmSetupController::class,'firmSetupView'])->name('firm-setup');
Route::get('location-setup',[FirmSetupController::class,'locationSetupView'])->name('location-setup');
Route::post('firm-department-process',[FirmSetupController::class,'createDepartment'])->name('firm-department-process');
Route::get('edit-firm-department/{id}',[FirmSetupController::class,'editDepartmentView'])->name('edit-firm-department');
Route::post('edit-firm-department-process/{id}',[FirmSetupController::class,'updateFirmDepartment'])->name('edit-firm-department-process');
Route::get('delete-firm-department/{id}', [FirmSetupController::class, 'deleteDepartment'])->name('delete-firm-department');

// Route::get('unit-setup',[FirmSetupController::class,'unitSetupView'])->name('unit-setup');
Route::post('unit-process',[FirmSetupController::class,'createUnit'])->name('unit-process');
Route::get('edit-unit/{id}',[FirmSetupController::class,'editUnitView'])->name('edit-unit');
Route::post('edit-unit-process/{id}',[FirmSetupController::class,'updateUnit'])->name('edit-unit-process');
Route::get('delete-unit/{id}', [FirmSetupController::class, 'deleteUnit'])->name('delete-unit');

// Route::get('branch-setup',[FirmSetupController::class,'branchSetupView'])->name('branch-setup');
Route::post('branch-process',[FirmSetupController::class,'createBranch'])->name('branch-process');
Route::get('edit-branch/{id}',[FirmSetupController::class,'editBranchView'])->name('edit-branch');
Route::post('edit-branch-process/{id}',[FirmSetupController::class,'updateBranch'])->name('edit-branch-process');
Route::get('delete-branch/{id}', [FirmSetupController::class, 'deleteBranch'])->name('delete-branch');

//Location Setup
Route::get('location-setup',[LocationSetupController::class,'index'])->name('location-setup');
Route::post('location-region-process',[LocationSetupController::class,'createRegion'])->name('location-region-process');
Route::get('edit-location-region/{id}',[LocationSetupController::class,'editRegionView'])->name('edit-location-region');
Route::post('edit-location-region-process/{id}',[LocationSetupController::class,'updateRegion'])->name('edit-location-region-process');
Route::get('delete-location-region/{id}', [LocationSetupController::class, 'deleteRegion'])->name('delete-location-region');
Route::post('location-district-process',[LocationSetupController::class,'createDistrict'])->name('location-district-process');
Route::get('edit-location-district/{id}',[LocationSetupController::class,'editDistrictView'])->name('edit-location-district');
Route::post('edit-location-district-process/{id}',[LocationSetupController::class,'updateDistrict'])->name('edit-location-district-process');
Route::get('delete-location-district/{id}', [LocationSetupController::class, 'deleteDistrict'])->name('delete-location-district');
// Route::post('create-leave-category-process',[LeaveSetupController::class,'createCategory'])->name('create-leave-category-process');
// Route::get('edit-leave-category/{id}',[LeaveSetupController::class,'editCategoryView'])->name('edit-leave-category');
// Route::post('edit-leave-category-process/{id}',[LeaveSetupController::class,'updateLeaveCategory'])->name('edit-leave-category-process');
// Route::get('delete-leave-category/{id}', [LeaveSetupController::class, 'deleteLeaveCategory'])->name('delete-leave-category');