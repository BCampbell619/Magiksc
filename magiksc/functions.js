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

document.querySelector('#MXList').addEventListener('mouseenter', function () {
    'use strict';
    
    Moto.hideAction(hiddenNav);
    
    if (!Moto.currState) {
        Moto.navAction('ProdOptions', 'drop-MX-show', 'drop-MX-hide');
        Moto.currState = true;
    }

});

// EventListener for Helmet navigation declared

document.querySelector('#HelmetNav').addEventListener('mouseenter', function () {
    'use strict';
    
    Helmet.hideAction(hiddenNav);
    
    if (!Helmet.currState) {
        Helmet.navAction('HelmetOptions', 'drop-HT-show', 'drop-HT-hide');
        Helmet.currState = true;
    }
    
});

// EventListener for Bike navigation declared

document.querySelector('#BikeNav').addEventListener('mouseenter', function () {
    'use strict';
    
    Bike.hideAction(hiddenNav);
    
    if (!Bike.currState) {
        Bike.navAction('BikeOptions', 'drop-BK-show', 'drop-BK-hide');
        Bike.currState = true;
    }
    
});

// EventListener for UTV navigation declared

document.querySelector('#OffRdNav').addEventListener('mouseenter', function () {
    'use strict';
    
    UTV.hideAction(hiddenNav);
    
    if (!UTV.currState) {
        UTV.navAction('UTVOptions', 'drop-UTV-show', 'drop-UTV-hide');
        UTV.currState = true;
    }
    
});

/*

header eventlistener - When the mouse moves into the header hide the drop content nav

*/
document.querySelector('#header').addEventListener('mouseenter', function () {
    'use strict';
    navigation.prototype.hideAction(hiddenNav);
});

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