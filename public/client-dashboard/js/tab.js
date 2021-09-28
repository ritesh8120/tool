// This demo uses A11yTab plugin
// https://github.com/azinasili/a11ytab
// https://npmjs.com/package/a11ytab
//
// Demo is using A11yTab from Unpkg CDN
// https://unpkg.com/a11ytab
// https://unpkg.com/a11ytab@2.0.3/dist/a11ytab.js

// Select element container for tabs
const tabEl = document.querySelectorAll('.tab-buttons');

// Initialize A11yTab on each element
// All options are shown
for (let i = 0; i < tabEl.length; i++) {
  const tabs = new A11yTab({
    selector: tabEl[i],
    tabPanelFocus: 'tab-panel--is-active',
    tabPanelBlur: 'tab-panel--is-disabled',
    tabFocus: 'tab-button--is-active',    
    tabBlur: 'tab-button--is-disabled',
    // focusOnLoad: false,
    // afterFocusFunction: null,
    // beforeFocusFunction: null,
    // addEvents: false,
    // eventAfterFocus: 'a11ytab:afterFocus',
    // eventBeforeBlur: 'a11ytab:beforeBlur',
    // hashNavigation: false,
    // tabToFocus: null,
  });
  tabs.init();
}


