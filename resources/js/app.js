/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';


/** Core */
import { library } from '@fortawesome/fontawesome-svg-core';
/** Component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
/** Icons */
import { faFloppyDisk, faTrash, faEdit, faMagnifyingGlass, faPlus, faXmark } from '@fortawesome/free-solid-svg-icons';

import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

library.add(faMagnifyingGlass, faEdit, faTrash, faPlus, faXmark, faFloppyDisk)

const app = createApp({})
    .component('font-awesome-icon', FontAwesomeIcon);

import ShowProductsComponent from './components/ShowProductsComponent.vue';
app.component('show-products-component', ShowProductsComponent);

import CreateProductsComponent from './components/CreateProductsComponent.vue';
app.component('create-products-component', CreateProductsComponent);

import ListProductsComponent from './components/ListProductsComponent.vue';
app.component('list-products-component', ListProductsComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
