
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('flash', require('./mixins/Flash.vue'));
Vue.component('paginator', require('./mixins/Paginator.vue'));

//supplier
Vue.component('suppliers', require('./supplier/Suppliers.vue'));
Vue.component('AddSupplier', require('./supplier/AddSupplier.vue'));
Vue.component('EditSupplier', require('./supplier/EditSupplier.vue'));

//category
Vue.component('categories', require('./category/Categories.vue'));
Vue.component('AddCategory', require('./category/AddCategory.vue'));
Vue.component('EditCategory', require('./category/EditCategory.vue'));

//subcategory
Vue.component('subcategories', require('./subcategory/Subcategories.vue'));
Vue.component('AddSubcategory', require('./subcategory/AddSubcategory.vue'));
Vue.component('EditSubcategory', require('./subcategory/EditSubcategory.vue'));

//warehouse
Vue.component('warehouses', require('./warehouse/Warehouses.vue'));
Vue.component('AddWarehouse', require('./warehouse/AddWarehouse.vue'));
Vue.component('EditWarehouse', require('./warehouse/EditWarehouse.vue'));

//employee
Vue.component('employees', require('./employee/Employees.vue'));
Vue.component('AddEmployee', require('./employee/AddEmployee.vue'));
Vue.component('EditEmployee', require('./employee/EditEmployee.vue'));

//customer
Vue.component('customers', require('./customer/Customers.vue'));
Vue.component('AddCustomer', require('./customer/AddCustomer.vue'));
Vue.component('EditCustomer', require('./customer/EditCustomer.vue'));

//income
Vue.component('incomes', require('./income/Incomes.vue'));
Vue.component('AddIncome', require('./income/AddIncome.vue'));
Vue.component('EditIncome', require('./income/EditIncome.vue'));

//expense
Vue.component('expenses', require('./expense/Expenses.vue'));
Vue.component('AddExpense', require('./expense/AddExpense.vue'));
Vue.component('EditExpense', require('./expense/EditExpense.vue'));

//product
Vue.component('products', require('./product/Products.vue'));
Vue.component('AddProduct', require('./product/AddProduct.vue'));
Vue.component('EditProduct', require('./product/EditProduct.vue'));

//purchase
Vue.component('purchases', require('./purchase/Purchases.vue'));
Vue.component('AddPurchase', require('./purchase/AddPurchase.vue'));
Vue.component('EditPurchase', require('./purchase/EditPurchase.vue'));

//sale
Vue.component('sales', require('./sale/Sales.vue'));
Vue.component('AddSale', require('./sale/AddSale.vue'));
Vue.component('EditSale', require('./sale/EditSale.vue'));

const app = new Vue({
	el: '#app'
});