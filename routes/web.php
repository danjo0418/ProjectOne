<?php


// Website Routes
Route::get('/', 'SiteController@home');

Route::get('properties', 'SiteController@property');
Route::get('properties/{offer}', 'SiteController@property');
Route::get('property-details/{code}', 'SiteController@propertyDetails');

Route::get('be-an-agent', 'SiteController@beOurAgent');
Route::get('our-agents', 'SiteController@ourAgents');
Route::get('our-agent/{name}', 'SiteController@ourAgentDetails');

Route::get('sell-your-properties', 'SiteController@sellYourProperties');
Route::get('news-and-updates', 'SiteController@resources');
Route::get('contact-us', 'SiteController@contactUs');

Route::get('find-city', 'PropertyController@cities');

Route::get('news-and-updates', 'SiteController@resources');

Route::post('postApplicant', 'MailerController@createApplication');	
Route::post('postContactUs', 'MailerController@createContactMessage');
Route::post('postInquiry', 'MailerController@createInquiry');
Route::post('postSellProperty', 'MailerController@createSellProperty');
Route::post('postAskProperty', 'MailerController@creatAskProperty');
Route::post('postSchedule', 'MailerController@createSchedule');

//UPDATED URL
Route::post('registerAccount', 'SiteController@registerAccount');

Route::post('customlogin', 'UserController@postLogin');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	
	Route::get('mail/inbox','MailerController@inbox');
	Route::get('mail/inbox/u/{code}','MailerController@message');
	Route::get('getRemoveMessage', 'MailerController@removeMessage');

	Route::get('summary', 'HomeController@summary');

	Route::get('profile', 'HomeController@profile');
	Route::post('postUpdateProfile', 'HomeController@updateProfile');
	Route::post('postChangePassword', 'HomeController@changePassword');

	Route::get('list-of-agents', 'AgentController@listOfAgent');
	Route::get('list-of-agents/{code}', 'AgentController@details');
	Route::get('register-form', 'AgentController@registerForm');
	Route::get('update-agents/{code}', 'AgentController@updateForm');

	Route::post('active-agent', 'AgentController@activeAgent');
	Route::post('inactive-agent', 'AgentController@inactiveAgent');
	Route::post('approved-agent', 'AgentController@approveAgent');
	Route::post('decline-agent', 'AgentController@declineAgent');
	Route::post('register-agent', 'AgentController@registerAgent');
	Route::post('update-agent', 'AgentController@updateAgent');

	Route::get('list-of-properties', 'PropertyController@listOfProperty');
	Route::get('list-of-properties/{code}', 'PropertyController@details');
	Route::get('list-your-property', 'PropertyController@createForm');
	Route::get('update-property/{code}', 'PropertyController@updateForm');
	Route::get('assign-agent-validation', 'PropertyController@assignAgentValidation');

	Route::get('assign-properties', 'PropertyController@AssignProperty');

	Route::post('create-property', 'PropertyController@createProperty');
	Route::post('postUpdateProperty', 'PropertyController@updateProperty');
	Route::post('postAssignAgent', 'PropertyController@assignAgent');
	Route::post('postStatus', 'PropertyController@changeStatus');
	Route::post('postRemoveAgent', 'PropertyController@removeAgent');
	Route::post('postApprove', 'PropertyController@approveProperty');
	Route::post('postDecline', 'PropertyController@declineProperty');
	Route::post('postRemove', 'PropertyController@removedProperty');
	Route::post('postArchive', 'PropertyController@archiveProperty');

	Route::get('history', 'HistoryController@index');
	Route::get('restore/properties', 'PropertyController@restore');
	Route::get('restore/agents', 'AgentController@restore');
});