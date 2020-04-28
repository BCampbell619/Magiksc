// Author:      Broc Campbell
// Date:        7/23/18
//
// Overview:    Contains all functions & code that manipulates the navigation of the index page


/*============================================================================================================================*/
/*                                                  Navigation functions                                                      */
/*============================================================================================================================*/

/*

navigation (constructor function). This is an object to handle all aspects of the navigation behavior.
currState   - this is the 'on/off' switch for the navigation state (i.e. hovered over - on/true, hover out - off/false)
apseColl    - this was for the mobile navigation state, but currState is used instead.
navID       - this holds the id of the target dropdown.
showClass   - this holds the class that shows the dropdown content
hideClass   - this holds the class that hides the dropdown content

navAction   - this function/method takes the navID, showClass, and hideClass as parameters. The element is selected by the ID and
              first the hideClass is removed and then the showClass is added to the element. (The is also works in reverse. The classes are just reversed in the paramter).
            
hideAction  - this function/method takes an array as a parameter. The array should be made up of all the objects that have been
              created for each navigational element (i.e. each link). This method will go through and check to see which are 
              true (i.e. visible) and hide them all.

*/

// navigation constructor function declared

function navigation(currentState, collapseState, id, classShow, classHide) {
    'use strict';
    this.currState = currentState;
    this.apseColl = collapseState;
    this.navID = id;
    this.showClass = classShow;
    this.hideClass = classHide;
}

// navAction method/function declared & added to navigation constructor

navigation.prototype.navAction = function(nav_id, class_show, class_hide) {
    'use strict';
    this.navID = nav_id;
    this.showClass = class_show;
    this.hideClass = class_hide;
    document.getElementById(this.navID).classList.remove(this.hideClass);
    document.getElementById(this.navID).classList.add(this.showClass);
}

// hideAction function/method declared and added to the navigation constructor

navigation.prototype.hideAction = function(obj_list) {
    'use strict';
    
    var i = 0;
    
    if (obj_list[i].currState === true) {
        
        obj_list[i].navAction(obj_list[i].navID, obj_list[i].hideClass, obj_list[i].showClass);
        obj_list[i].currState = false;
        
    } else {
        
        i += 1;
        
    }
   
    if (obj_list[i].currState === true) {
        
        obj_list[i].navAction(obj_list[i].navID, obj_list[i].hideClass, obj_list[i].showClass);
        obj_list[i].currState = false;
        
    } else {
        
        i += 1;
        
    }
    
    if (obj_list[i].currState === true) {
        
        obj_list[i].navAction(obj_list[i].navID, obj_list[i].hideClass, obj_list[i].showClass);
        obj_list[i].currState = false;
        
    } else {
        
        i += 1;
        
    }
   
    if (obj_list[i].currState === true) {
        
        obj_list[i].navAction(obj_list[i].navID, obj_list[i].hideClass, obj_list[i].showClass);
        obj_list[i].currState = false;
        
    } else {
        
        i += 1;
    
    }
    
    if (obj_list[i].currState === true) {
        
        obj_list[i].navAction(obj_list[i].navID, obj_list[i].hideClass, obj_list[i].showClass);
        obj_list[i].currState = false;
        
    } else {
        
        i += 1;
    
    }
    
}

// Objects created for each navigational element.

var Moto = new navigation(false, false, 'ProdOptions', 'drop-MX-show', 'drop-MX-hide');
var Helmet = new navigation(false, false, 'HelmetOptions', 'drop-HT-show', 'drop-HT-hide');
var Bike = new navigation(false, false, 'BikeOptions', 'drop-BK-show', 'drop-BK-hide');
var UTV = new navigation(false, false, 'UTVOptions', 'drop-UTV-show', 'drop-UTV-hide');
var mobileNav = new navigation(false, false, 'MobileList', 'drop-content-show', 'drop-content-hide');


// Array declared for hideAction function

var hiddenNav = [];

// Values added to array

hiddenNav = [Moto, Helmet, Bike, UTV, mobileNav];

$(function () {
    
    let srchFlag = false;
    
    $('#siteSearch').click(function () {
        
        if (!srchFlag) {
            
            $('#keyword').animate({width: '200px', paddingTop: '2px', paddingBottom:'2px', paddingRight: '4px', paddingLeft: '4px', border: 'solid 1px #999'}, 450);
            srchFlag = true;
            
        } else {
            
            $('#keyword').animate({width: '0px', padding: '0px', border: 'none'}, 350);
            srchFlag = false;
        }
        
    });
    
});

/*============================================================================================================================*/
/*                                                  End of declarations                                                       */
/*============================================================================================================================*/


/*============================================================================================================================*/
/*                                              EvenListeners for Navigation                                                  */
/*============================================================================================================================*/

/*

One EventListener for each navigation item. Each listener follows the same pattern:
    1st - hide all other visible navigation
    2nd - display the navigation that is receiving the focus (i.e. the hover)

*/


// EventListener for Moto navigation declared

/*document.querySelector('#MXList').addEventListener('click', function () {
    'use strict';
    console.log(event.target.id);
    Moto.hideAction(hiddenNav);
    
    if (!Moto.currState) {
        Moto.navAction('ProdOptions', 'drop-MX-show', 'drop-MX-hide');
        Moto.currState = true;
    }

});

document.querySelector('#MXList').addEventListener('mouseout', function () {
    
    let eventID = event.target.id;
    
    if (eventID == 'moto') {
        
        Moto.hideAction(hiddenNav);
        
    }
    
});

// EventListener for Helmet navigation declared

document.querySelector('#HelmetNav').addEventListener('click', function () {
    'use strict';
    console.log(event.target.id);
    Helmet.hideAction(hiddenNav);
    
    if (!Helmet.currState) {
        Helmet.navAction('HelmetOptions', 'drop-HT-show', 'drop-HT-hide');
        Helmet.currState = true;
    }
    
});

document.querySelector('#HelmetNav').addEventListener('mouseout', function () {
    
    let eventID = event.target.id;
    
    if (eventID == 'helmet') {
        
        Helmet.hideAction(hiddenNav);
        
    }
    
});

// EventListener for Bike navigation declared

document.querySelector('#BikeNav').addEventListener('click', function () {
    'use strict';
    console.log(event.target.id);
    Bike.hideAction(hiddenNav);
    
    if (!Bike.currState) {
        Bike.navAction('BikeOptions', 'drop-BK-show', 'drop-BK-hide');
        Bike.currState = true;
    }
    
});

document.querySelector('#BikeNav').addEventListener('mouseout', function () {
    
    let eventID = event.target.id;
    
    if (eventID == 'bike') {
        
        Bike.hideAction(hiddenNav);
        
    }
    
});

// EventListener for UTV navigation declared

document.querySelector('#OffRdNav').addEventListener('click', function () {
    'use strict';
    console.log(event.target.id);
    UTV.hideAction(hiddenNav);
    
    if (!UTV.currState) {
        UTV.navAction('UTVOptions', 'drop-UTV-show', 'drop-UTV-hide');
        UTV.currState = true;
    }
    
});

document.querySelector('#OffRdNav').addEventListener('mouseout', function () {
    
    let eventID = event.target.id;
    
    if (eventID == 'utv') {
        
        UTV.hideAction(hiddenNav);
        
    }
    
});

/*

header eventlistener - When the mouse moves into the header hide the drop content nav

*//*
document.querySelector('#header').addEventListener('mouseenter', function () {
    'use strict';
    navigation.prototype.hideAction(hiddenNav);
    console.log(event.target.id);
}); */

// --------------------------------------------------------------------------------->

// Mobile navigation evenlistener - when the icon is clicked/touched show or hide the content

document.querySelector('.navToggle').addEventListener('click', function () {
    'use strict';
    
    if (mobileNav.currState === false) {
        mobileNav.navAction('MobileList', 'drop-content-show', 'drop-content-hide');
        mobileNav.currState = true;
    } else if (mobileNav.currState === true) {
        mobileNav.hideAction(hiddenNav);
        mobileNav.currState = false;
    }
    
});

/*============================================================================================================================*/
/*                                          End of EvenListeners for Navigation                                               */
/*============================================================================================================================*/

let MagikNavUIController = (() => {
    'use strict';
    
    let magikDOMStrings = {
            motoNav: "#moto",
            motoOptNav: "#motoOptions",
            motoShowClass: "drop-moto-show",
            motoHideClass: "drop-moto-hide",
            helmetNav: "#helmet",
            helmetShowClass: "drop-helmet-show",
            helmetHideClass: "drop-helmet-hide",
            helmetOptNav: "#helmetOptions",
            bikeNav: "#bike",
            bikeOptNav: "#bikeOptions",
            bikeShowClass: "drop-bike-show",
            bikeHideClass: "drop-bike-hide",
            utvNav: "#utv",
            utvOptNav: "#utvOptions",
            utvShowClass: "drop-utv-show",
            utvHideClass: "drop-utv-hide"
        },
        magikFlags = {
            motoFlag: false,
            helmetFlag: false,
            bikeFlag: false,
            utvFlag: false
        },
        getCSS,
        setCSS,
        checkFlags;
    
    getCSS = event => {
        
        if (event == 'moto') {
            
            if (!magikFlags.motoFlag) {
            
                setCSS(event, magikFlags.motoFlag);
                magikFlags.motoFlag = true;
                checkFlags(event);
                
            } else {
                
                setCSS(event, magikFlags.motoFlag);
                magikFlags.motoFlag = false;
                
            }
            
        } else if (event == 'helmet') {
            
            if (!magikFlags.helmetFlag) {
            
                setCSS(event, magikFlags.helmetFlag);
                magikFlags.helmetFlag = true;
                checkFlags(event);
                
            } else {
                
                setCSS(event, magikFlags.helmetFlag);
                magikFlags.helmetFlag = false;
                
            }
            
        } else if (event == 'bike') {
            
            if (!magikFlags.bikeFlag) {
            
                setCSS(event, magikFlags.bikeFlag);
                magikFlags.bikeFlag = true;
                checkFlags(event);
                
            } else {
                
                setCSS(event, magikFlags.bikeFlag);
                magikFlags.bikeFlag = false;
                
            }
            
        } else if (event == 'utv') {
            
            if (!magikFlags.utvFlag) {
            
                setCSS(event, magikFlags.utvFlag);
                magikFlags.utvFlag = true;
                checkFlags(event);
                
            } else {
                
                setCSS(event, magikFlags.utvFlag);
                magikFlags.utvFlag = false;
                
            }
            
        }
        
    };
    
    setCSS = (eventID, flag) => {
        
        if (!flag) {
            
            document.querySelector('#'+eventID+'Options').classList.remove('drop-'+eventID+'-hide');
            document.querySelector('#'+eventID+'Options').classList.add('drop-'+eventID+'-show');
            document.querySelector('.drop-'+eventID+'-show').style.height = document.querySelector('.drop-'+eventID+'-show').scrollHeight + "px";
            
        } else {
            
            document.querySelector('#'+eventID+'Options').classList.remove('drop-'+eventID+'-show');
            document.querySelector('#'+eventID+'Options').classList.add('drop-'+eventID+'-hide');
            document.querySelector('.drop-'+eventID+'-hide').style.height = "0px";
            
        }
        
    };
    
    checkFlags = eventID => {
        
        if (eventID == 'moto') {
            
            if (magikFlags.motoFlag) {
                
                magikFlags.helmetFlag = true;
                setCSS('helmet', magikFlags.helmetFlag);
                magikFlags.helmetFlag = false;
                magikFlags.bikeFlag = true;
                setCSS('bike', magikFlags.bikeFlag);
                magikFlags.bikeFlag = false;
                magikFlags.utvFlag = true;
                setCSS('utv', magikFlags.utvFlag);
                magikFlags.utvFlag = false;
                
            } else {
                
                setCSS(eventID, magikFlags.motoFlag);
                
            }
            
        } else if (eventID == 'helmet') {
            
            if (magikFlags.helmetFlag) {
                
                magikFlags.motoFlag = true;
                setCSS('moto', magikFlags.motoFlag);
                magikFlags.motoFlag = false;
                magikFlags.bikeFlag = true;
                setCSS('bike', magikFlags.bikeFlag);
                magikFlags.bikeFlag = false;
                magikFlags.utvFlag = true;
                setCSS('utv', magikFlags.utvFlag);
                magikFlags.utvFlag = false;
                
            } else {
                
                setCSS(eventID, magikFlags.helmetFlag);
                
            }
            
        } else if (eventID == 'bike') {
            
            if (magikFlags.bikeFlag) {
                
                magikFlags.motoFlag = true;
                setCSS('moto', magikFlags.motoFlag);
                magikFlags.motoFlag = false;
                magikFlags.helmetFlag = true;
                setCSS('helmet', magikFlags.helmetFlag);
                magikFlags.helmetFlag = false;
                magikFlags.utvFlag = true;
                setCSS('utv', magikFlags.utvFlag);
                magikFlags.utvFlag = false;
                
            } else {
                
                setCSS(eventID, magikFlags.bikeFlag);
                
            }
            
        } else if (eventID == 'utv') {
            
            if (magikFlags.utvFlag) {
                
                magikFlags.motoFlag = true;
                setCSS('moto', magikFlags.motoFlag);
                magikFlags.motoFlag = false;
                magikFlags.helmetFlag = true;
                setCSS('helmet', magikFlags.helmetFlag);
                magikFlags.helmetFlag = false;
                magikFlags.bikeFlag = true;
                setCSS('bike', magikFlags.bikeFlag);
                magikFlags.bikeFlag = false;
                
            } else {
                
                setCSS(eventID, magikFlags.utvFlag);
                
            }
            
        }
        
    };
    
    return {
        
        getDOMS: () => {
            
            return magikDOMStrings;
            
        },
        
        navCSS: eventID => {
            
            getCSS(eventID);
            
        },
        
        setNavCSS: (eventID, flag) => {
            
            setCSS(eventID, flag);
            
        }
        
    };
    
})();

let MagikNavController = ((magikNavUI) => {
    'use strict';
    
    let magikDOMs = magikNavUI.getDOMS(),
        display,
        setListeners;
    
    display = (event) => {
        
        let eventID = event.target.id;
        magikNavUI.navCSS(eventID);
        
    }
    
    setListeners = () => {
        
        if (document.querySelector(magikDOMs.motoNav) != null) {
            
            document.querySelector(magikDOMs.motoNav).addEventListener('click', display);
            
        }
        
        if (document.querySelector(magikDOMs.helmetNav) != null) {
            
            document.querySelector(magikDOMs.helmetNav).addEventListener('click', display);
            
        }
        
        if (document.querySelector(magikDOMs.bikeNav) != null) {
            
            document.querySelector(magikDOMs.bikeNav).addEventListener('click', display);
            
        }
        
        if (document.querySelector(magikDOMs.utvNav) != null) {
            
            document.querySelector(magikDOMs.utvNav).addEventListener('click', display);
            
        }
        
        window.addEventListener('click', function () {
            
            
            
        });
        
        
    };
    
    return {
        
        init: () => {
            
            setListeners();
            
        }
        
    };
    
})(MagikNavUIController);

MagikNavController.init();

let ApplicationFormData = (() => {
    
    let formData = {
            name: [],
            phone: [],
            address: [],
            city: [],
            state: [],
            zip: [],
            country: [],
            email: [],
            type: [],
            make: [],
            model: [],
            year: [],
            racingYears: [],
            age: [],
            raceNumber: [],
            raceClass: [],
            comments: []
        },
        clearData;
    
    return {
        
        getDataObj: () => {
            
            return formData;
            
        }
        
    };
    
})();

let ApplicationFormUI = (() => {
    
    let formElements = {
            list: ["#Name", "#Phone", "#Address", "#City", "#State", "#Zip", "#Country", "#Email", "#type", "#Make", "#Model", "#Year", "#Years_racing", "#Age", "#Race_number", "#Race_class", "#Comment", "#submitApp"],
            name: "#Name",
            phone: "#Phone",
            address: "#Address",
            city: "#City",
            state: "#State",
            zip: "#Zip",
            email: "#Email",
            type: "#type",
            make: "#Make",
            model: "#Model",
            year: "#Year",
            racingYears: "#Years_racing",
            age: "#Age",
            raceNumber: "#Race_number",
            raceClass: "#Race_class",
            submitBtn: "#submitApp",
            msg1: "#formMsg1",
            msg2: "#formMsg2"
        };
    
    return {
        
        getFormDOMs: () => {
            
            return formElements;
            
        }
        
    };
    
})();

let ApplicationFormController = ((appFrmData, appFrmUI) => {
    
    let assignInput,
        frmData = appFrmData.getDataObj(),
        uiDOMs = appFrmUI.getFormDOMs(),
        setListeners,
        validate;
    
    assignInput = (dataObj, uiObj) => {
        
        let valueArr = [],
            inputNodes = document.querySelectorAll('input');
        
        Array.from(inputNodes).forEach(cur => {
            
            if (cur.hasAttribute('id')) {
                
                let tmpID = cur.getAttribute('id');
                
                if (tmpID !== 'keyword' && tmpID !== 'submitApp') {
                    
                    valueArr.push(cur.value);
                    
                }
                
            }
            
        });
        
        valueArr.push(document.querySelector(uiObj.list[16]).value);
        
    };
    
    validate = event => {
        
        let count = 0;
        
        event.preventDefault();
        
        for (let i = 0; i < uiDOMs.list.length; i++) {
            
            if (uiDOMs.list[i] !== "#Country" && uiDOMs.list[i] !== "#Comment") {
            
                if (document.querySelector(uiDOMs.list[i]).value == "") {
                    
                    count = count + 1;
                    
                    if (i >= 0 && i <= 6) {
                        
                        document.querySelector(uiDOMs.msg1).innerHTML = `<small class="text-danger">Please fill out all the required information</small>`;
                        
                    } else {
                        
                        document.querySelector(uiDOMs.msg2).innerHTML = `<small class="text-danger">Please fill out all the required information</small>`;
                        
                    }
                    
                    document.querySelector(uiDOMs.list[i]).classList.add('is-invalid');
                    
                }
                
            }
            
        }
        
        if (count == 0) {
            
            assignInput(frmData, uiDOMs);
            //event.submit();
            
        }
        
    };
    
    setListeners = () => {
        
        if (document.querySelector(uiDOMs.submitBtn) !== null) {
            
            document.querySelector(uiDOMs.submitBtn).addEventListener('click', validate);
            
        }
        
    };
    
    return {
        
        init: () => {
            
            setListeners();
            
        }
    };
    
})(ApplicationFormData, ApplicationFormUI);

ApplicationFormController.init();