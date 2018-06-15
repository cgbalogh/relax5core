/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var _rlx5_viewport_width;
var _rlx5_modal_form_width;
var _rlx5_max_modal_form_width = 600;
var test2;

$(document).ready(function() {
    // set needed js-vars
    _rlx5_viewport_width = $(window).width();
    _rlx5_modal_form_width = Math.min(_rlx5_viewport_width, _rlx5_max_modal_form_width);
    
    // initiate sortables
    activateSortables();
    
    // initiate collapsers
    activateCollapser('.rlx5-collapser');
    
    // activate jt editor
    activateJte('.rlx5-jte');

    // activate hide link area: double click on link area will hide the link column (middle)
    activateHideLinkArea();
    
    //
    activateAutocomplete();
    
    // check for touch device
    if (isTouchDevice()) {
        $('.rlx5-item-person-header .rlx5-buttons').show();
    }
    
    $('.selectWindow').click( function ( event ) {
        event.stopPropagation();
        window.open( $(this).attr('href'), 'selectperson', 'width=800, height=600, top=100, left=40');
        return false;
    });

    doctitle = $('[data-pagetitle]').data('pagetitle');
    if (typeof(doctitle) != 'undefined') {
        document.title = doctitle;
    }
    
});

/**
 * 
 * @returns {Number}
 */
function uniqId() {
  return Math.round(new Date().getTime() + (Math.random() * 100));
}

/**
 *
 */
function str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

/**
 * 
 * @returns {Node.documentElement|document.documentElement|Node|Element|HTMLDocument.documentElement|String}
 */
function isTouchDevice() {
    return 'ontouchstart' in document.documentElement;
}

/**
 * 
 * @param string selector
 * @param string scope
 * @returns {undefined}
 */
function activateCollapser( selector, scope, button ) {
    if (button) {
        $el = $(selector, scope).button();
    } else {
        $el = $(selector, scope);
    }
    

    $el.unbind('click').click(function(event){
        // modalWindowStack[0].parent().addClass('rlx5-smooth');
        $container = $(this).next('.rlx5-collapsible');
        if ($container.hasClass('rlx5-collapsed')) {
            $container.slideDown(400,function(){
                // modalWindowStack[0].dialog("option", "position", {my: "center", at: "center", of: window});
            }).toggleClass('rlx5-collapsed');
            $(this).find('.ion').toggleClass('ion-chevron-down').toggleClass('ion-chevron-up');
        } else {
            $container.slideUp(400,function(){
                // modalWindowStack[0].dialog("option", "position", {my: "center", at: "center", of: window});
            }).toggleClass('rlx5-collapsed');
            $(this).find('.ion').toggleClass('ion-chevron-down').toggleClass('ion-chevron-up');
        }
        
        // modalWindow = $(this).closest('.modalWindow');
        
    });
}

/**
 * activateLoadDetails
 * activates the source reload
 *
 * @param {string} selector
 * @param {string} scope
 * @returns {undefined}
 */
function activateLoadDetails ( selector, scope, targetselector, uri ) {
	$( selector, scope).change(function(){
        $.post(uri, 'tx_relax5core_core[source]=' + $(this).val() + '&tx_relax5core_core[parent]=' + $(this).attr('parent'), function(data) {$( targetselector ).html(data);});
	});
}


/**
 * 
 * @param {string} selector
 * @param {string} scope
 * @returns {undefined}
 */
function activateJte( selector, scope) {
    $(selector, scope).jqte({
        br: false,
        button: 'SEND',
        formats: [
            ["p", "Standard"],
            ["h1", "Ü groß"],
            ["h2", "Ü mittel"],
            ["h3", "Ü klein"]
        ],
        link: false,
        ol: false,
        ul: false,
        rule: false,
        source: false,
        status: true,
        sub: false,
        strike: false,
        sup: false,
        titletext:[
        {title:"Textformat"},
        {title:"Font Size"},
        {title:"Select Color"},
        {title:"Fett",hotkey:"F"},
        {title:"Kursiv",hotkey:"K"},
        {title:"Underline",hotkey:"U"},
        {title:"Ordered List",hotkey:"."},
        {title:"Unordered List",hotkey:","},
        {title:"Subscript",hotkey:"down arrow"},
        {title:"Superscript",hotkey:"up arrow"},
        {title:"Outdent",hotkey:"left arrow"},
        {title:"Indent",hotkey:"right arrow"},
        {title:"Justify Left"},
        {title:"Justify Center"},
        {title:"Justify Right"},
        {title:"Strike Through",hotkey:"K"},
        {title:"Add Link",hotkey:"L"},
        {title:"Remove Link",hotkey:""},
        {title:"Cleaner Style",hotkey:"Delete"},
        {title:"Horizontal Rule",hotkey:"H"},
        {title:"Source",hotkey:""}              
        ],
        unlink: false
    });
    
    $('.jqte_editor').focusin(function(){$(this).prevAll('.jqte_toolbar').show()});
    $('.jqte_editor').focusout(function(){$(this).prevAll('.jqte_toolbar').hide()});   
    $('.jqte_toolbar').hide();
}

/**
 * @param int type
 * @param string prefix
 * @param collection arguments
 * 
 * Prepares a callback url to backend
 */
function createUrl ( prefix, arguments, pageType ) {
	var url = '?type=' + pageType;

	for (index in arguments) {
		url += '&' + prefix + '[' + index + ']=' + arguments[index];
	}
	return url;
}

/**
 * 
 * @returns {String}
 */
function activateComputeRights() {
    $('.rlx5-rightsarray [type=checkbox]').click(function(){
        $('#rlx5-permissions').val(computeRights());
    });
    
    pad = "000000000";
    rights = parseInt($('#rlx5-permissions').val(),8).toString(2);
    rights = (pad + rights).slice(-pad.length);
    for(i=0;i<9;i++) {
        if (rights[i] == 1) {
            $($('.rlx5-rightsarray [type=checkbox]')[i]).prop('checked', 'checked');
        }
    }
    
}

/**
 * 
 * @returns {String}
 */
function computeRights () {
    var i=8;
    var rights = '';
    var sum = 0;
    $('.rlx5-rightsarray [type=checkbox]').each(function(){
        rights += ($(this).prop('checked')) ? '1' : '0';
    });
    return parseInt(rights,2).toString(8);
}

/**
 * 
 * @returns {undefined}
 */
function activateHideLinkArea() {
    $('.rlx5-item-link-info').dblclick(function(){
        $('.rlx5-link').hide();
        $('.rlx5-datagrid-container').css('gridTemplateColumns','1fr 0fr 1fr')
    });
    $('.rlx5-item-person-info').dblclick(function(){
        $('.rlx5-link').show();
        $('.rlx5-datagrid-container').css('gridTemplateColumns','1fr 1fr 1fr')
    });
    $('.rlx5-item-company-info').dblclick(function(){
        $('.rlx5-link').show();
        $('.rlx5-datagrid-container').css('gridTemplateColumns','1fr 1fr 1fr')
    });
}

/**
 * No params, expects uids in uid attribute and calls function in uri attribute of sort container
 * @returns {undefined}
 */
function activateSortables() {
    $('.sortable').sortable({
        update: function(event, ui) {
            // create new uidlist array
            uidListArray = [];

            sortref = ''
            if ($(this).attr('sortref')) {
                sortref = $(this).attr('sortref');
                // search all elemenmts with an uid attribute and append to list in the current active order
                // but take only elements with the appropriate sortref
                $(this).find('[uid][sortref='+sortref+']').each(function(){
                    uidListArray.push($(this).attr('uid'));
                });
            } else {
                // search all elemenmts with an uid attribute and append to list in the current active order
                $(this).find('[uid]').each(function(){
                    uidListArray.push($(this).attr('uid'));
                });
            }
            
            // make comma separated list from uids
            uidList = uidListArray.join();
            
            // get uri from atribute
            uri = $(this).attr('uri');
            
            // call uri via ajax
            $.post(uri, 'tx_relax5core_core[uidlist]=' + uidList, function(data) {});
        }
    });
}

function callUri( selector, scope, attributeList ) {
    // get the uri from attribute
    uri = $( selector, scope ).attr('uri');
    prefix = $( selector, scope ).attr('prefix');
    onsuccess = makeFn ( $( selector, scope ).attr('onsuccess') );
    
    // add all the required parameters
    attributeListArray = attributeList.split(',');
    postData = '';
    for (i=0;i < attributeListArray.length; i++) {
        attr = $( selector, scope ).attr(attributeListArray[i]);
        postData += postData ? '&' : '';
        postData += prefix + '[' + attributeListArray[i] + ']=' + attr;
    }

    // call uri via ajax
    $.post(uri, postData, function(data) {
        if (typeof(onsuccess) == 'function') {
            onsuccess();
        }
    });
}

/**
 * showErrors
 * @returns {undefined}
 */
function showErrors() {
    // show errors
    if ($('.rlx5-message-container').has('*').length > 0) {
      if (isTouchDevice()) {
        $('.rlx5-message-container').css('position','relative');
      }
      $('.rlx5-message-container').click(function(){$(this).fadeOut();}).fadeIn();
    }
}

/**
 * 
 * @returns {undefined}
 */
function newProject() {
    $('.ui-button', '#projectList').click();
}

/**
 * 
 * @returns {undefined}
 */
function activateImgDD () {
	$('.dd').find('option').each(function(){
		imagePath = $(this).closest('select').attr('dd');
		myImage = imagePath.replace('###ID###', $(this).val());
		$(this).attr('title',myImage);
	});
	
	try {
		$( '.dd' ).msDropDown({visibleRows:8});
        
        // set to equal widths workaround
        w = $('.dd.ddcommon').css('width');
        $('.dd.ddcommon').css('width', w);
	} catch(e) {
//		alert(e.message);
	}
}


/**
 * 
 * @returns {undefined}
 */
function activateAutocomplete() {
    $('[data-autocomplete]').each(function(){
        var $inputElement = $(this);
    	$(this).focus(function () {
            condition = $(this).data('autocomplete-condition').split(';');
            conditionString = 'tx_relax5core_core[repository]=' + $(this).data('autocomplete-repository');
            conditionString += '&tx_relax5core_core[findmethod]=' + $(this).data('autocomplete-findmethod');
            for (i = 0; i < condition.length; i++) {
                subcondition = condition[i].split(' ');
                conditionString += '&tx_relax5core_core[condition][' + i + '][property]=' + subcondition[0];
                conditionString += '&tx_relax5core_core[condition][' + i + '][operator]=' + subcondition[1];
                if (subcondition[2] == 'TERM') {
                    conditionString += '&tx_relax5core_core[condition][' + i + '][value]=TERM';
                } else {
                    conditionString += '&tx_relax5core_core[condition][' + i + '][value]=' + $('[data-autocomplete-id=' + subcondition[2] + ']').val();
                }
            }
            
            uri = $(this).data('autocomplete-uri');
            $inputElement.autocomplete({
                source: function(request, response) {
                    $.post(
                        uri, 
                        conditionString + '&tx_relax5core_core[term]=' + request.term, 
                        function(data){
                            $.parseJSON(data), response($.parseJSON(data));
                        }),
                        'json'
                }, 
                minLength: 2, 
                delay: 0, 
                autoFocus: true,
                select: function(event, ui){
                    updateFieldList = $inputElement.data('autocomplete-select').split(';');
                    for (j = 0; j < updateFieldList.length; j++) {
                        var elements = updateFieldList[j].split('=');
                        if (typeof($(elements[0]).attr('type'))!='undefined') {
                            $(elements[0]).val(ui.item[elements[1]]);
                        } else if (typeof($(elements[0]+'_'+ui.item[elements[1]]).attr('type'))!='undefined') {
                            $(elements[0]+'_'+ui.item[elements[1]]).prop('checked',true);
                        }
                    }
                    if (focus = $inputElement.data('autocomplete-focus')) {
                        $(focus).focus().select();
                    }
                }
            });
                    // $('#city').val(ui.item.city);
                    // $('#state').val(ui.item.state);                }
             

            
            /*
            $.post(
                uri, 
                conditionString, 
                function(data) {
                    console.log(data);
                });            
            
            
            country = $( '#country' ).attr('value');
            if (typeof(country) == 'undefined') country = 'A';
            zip = $( '#zip' ).attr('value');
            arguments = {format: 'json', controller:'Ajax', action: 'autocomplete', catalogue: 'city', constraint: 'countryCode_eq_' + country + '+zip_eq_' + zip};
            url = createUrl(extensionPrefix, arguments, 1100);
            $( this ).autocomplete({source: url, minLength: 0, delay: 0, autoFocus: true, select: function(event, ui){
                $('#zip').val(ui.item.zip);
                $('#state').val(ui.item.state);
            }}); 
            */
        });
        
    });
    
    
    
    
    return;
    $('#city').autocomplete({
        source: function(request, respoonse) {
            $.ajax
        }
    });
}