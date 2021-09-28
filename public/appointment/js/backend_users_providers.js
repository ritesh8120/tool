/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * This class contains the Providers helper class declaration, along with the "Providers" tab
 * event handlers. By deviding the backend/users tab functionality into separate files
 * it is easier to maintain the code.
 *
 * @class ProvidersHelper
 */
var ProvidersHelper = function() {
    var providerId = 91;
    this.filterResults = {}; // Store the results for later use.
};

/**
 * Bind the event handlers for the backend/users "Providers" tab.
 */
ProvidersHelper.prototype.bindEventHandlers = function() {
      /**
     * Event: Filter Provider Row "Click"
     *
     * Display the selected provider data to the user.
     */
   

      /**
     * Event: Save Provider Button "Click"
     */
    $('#save-provider').click(function() {



        var provider = {
            'settings': {
                'working_plan': JSON.stringify(BackendUsers.wp.get())
            }
        };

        BackendUsers.helper.save(provider);
    });

    /**
     * Event: Reset Working Plan Button "Click".
     */
    $('#reset-working-plan').click(function() {
        $('.breaks').empty();
        $('.work-start, .work-end').val('');
        BackendUsers.wp.setup(GlobalVariables.workingPlan);
        BackendUsers.wp.timepickers(false);
    });
};

/**
 * Save provider record to database.
 *
 * @param {object} provider Contains the admin record data. If an 'id' value is provided
 * then the update operation is going to be executed.
 */
ProvidersHelper.prototype.save = function(provider) {
    //////////////////////////////////////////////////
    //console.log('Provider data to save:', provider);
    //////////////////////////////////////////////////

    var postUrl = GlobalVariables.baseAPIUrl + 'ajax_save_provider';
    var postData = {
        'csrfToken': GlobalVariables.csrfToken,
        'provider': JSON.stringify(provider)
    };

    $.post(postUrl, postData, function(response) {
        ///////////////////////////////////////////////////
        //console.log('Save Provider Response:', response);
        ///////////////////////////////////////////////////
        if (!GeneralFunctions.handleAjaxExceptions(response)) return;
        Backend.displayNotification("Setting saved.");
    }, 'json').fail(GeneralFunctions.ajaxFailureHandler);
};


/**
 * Display a provider record into the admin form.
 *
 * @param {object} provider Contains the provider record data.
 */
ProvidersHelper.prototype.display = function(provider) {
    $('#provider-services input[type="checkbox"]').prop('checked', false);
    $.each(provider.services, function(index, serviceId) {
        $('#provider-services input[type="checkbox"]').each(function() {
            if ($(this).attr('data-id') == serviceId) {
                $(this).prop('checked', true);
            }
        });
    });

    // Display working plan
    $('#providers .breaks tbody').empty();
    var workingPlan = $.parseJSON(provider.settings.working_plan);
    BackendUsers.wp.setup(workingPlan);
    $('.breaks').find('.edit-break, .delete-break').prop('disabled', true);
};

/**
 * Filters provider records depending a string key.
 *
 * @param {string} key This is used to filter the provider records of the database.
 * @param {numeric} selectId (OPTIONAL = undefined) If set, when the function is complete
 * a result row can be set as selected.
 * @param {bool} display (OPTIONAL = false) If true then the selected record will be also
 * displayed.
 */
ProvidersHelper.prototype.filter = function(key, selectId, display) {
    if (display == undefined) display = false;

    var postUrl = GlobalVariables.baseAPIUrl + 'ajax_filter_providers';
    var postData = {
        'csrfToken': GlobalVariables.csrfToken,
        'key': key
    };

    $.post(postUrl, postData, function(response) {
        //////////////////////////////////////////////////////
        //console.log('Filter providers response:', response);
        //////////////////////////////////////////////////////

        if (!GeneralFunctions.handleAjaxExceptions(response)) return;

        BackendUsers.helper.filterResults = response;


        $('#filter-providers .results').data('jsp').destroy;
        $('#filter-providers .results').html('');
        $.each(response, function(index, provider) {
            var html = ProvidersHelper.prototype.getFilterHtml(provider);
            $('#filter-providers .results').append(html);
        });
        $('#filter-providers .results').jScrollPane({ mouseWheelSpeed: 70 });

        if (response.length == 0) {
            $('#filter-providers .results').html('<em>' + EALang['no_records_found'] + '</em>')
        }

        if (selectId != undefined) {
            BackendUsers.helper.select(selectId, display);
        }
    }, 'json').fail(GeneralFunctions.ajaxFailureHandler);
};


/**
 * Initialize the editable functionality to the break day table cells.
 *
 * @param {object} $selector The cells to be initialized.
 */
ProvidersHelper.prototype.editableBreakDay = function($selector) {
    var weekDays = {};
    weekDays[EALang['monday']] = 'Monday';
    weekDays[EALang['tuesday']] = 'Tuesday';
    weekDays[EALang['wednesday']] = 'Wednesday';
    weekDays[EALang['thursday']] = 'Thursday';
    weekDays[EALang['friday']] = 'Friday';
    weekDays[EALang['saturday']] = 'Saturday';
    weekDays[EALang['sunday']] = 'Sunday';


    $selector.editable(function(value, settings) {
        return value;
    }, {
        'type': 'select',
        // 'data': '{ "Monday": "Monday", "Tuesday": "Tuesday", "Wednesday": "Wednesday", '
        //         + '"Thursday": "Thursday", "Friday": "Friday", "Saturday": "Saturday", '
        //         + '"Sunday": "Sunday", "selected": "Monday"}',
        'data': weekDays,
        'event': 'edit',
        'height': '30px',
        'submit': '<button type="button" class="hidden submit-editable">Submit</button>',
        'cancel': '<button type="button" class="hidden cancel-editable">Cancel</button>',
        'onblur': 'ignore',
        'onreset': function(settings, td) {
            if (!BackendUsers.enableCancel) return false; // disable ESC button
        },
        'onsubmit': function(settings, td) {
            if (!BackendUsers.enableSubmit) return false; // disable Enter button
        }
    });
};

/**
 * Initialize the editable functionality to the break time table cells.
 *
 * @param {object} $selector The cells to be initialized.
 */
ProvidersHelper.prototype.editableBreakTime = function($selector) {
    $selector.editable(function(value, settings) {
        // Do not return the value because the user needs to press the "Save" button.
        return value;
    }, {
        'event': 'edit',
        'height': '25px',
        'submit': '<button type="button" class="hidden submit-editable">Submit</button>',
        'cancel': '<button type="button" class="hidden cancel-editable">Cancel</button>',
        'onblur': 'ignore',
        'onreset': function(settings, td) {
            if (!BackendUsers.enableCancel) return false; // disable ESC button
        },
        'onsubmit': function(settings, td) {
            if (!BackendUsers.enableSubmit) return false; // disable Enter button
        }
    });
};

