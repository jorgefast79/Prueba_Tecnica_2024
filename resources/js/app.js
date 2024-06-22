/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});


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

//Search block
$(function ()
        {
            'use strict';

    $(document).on('keyup', '#search-form .search', function ()
    {
        if($(this).val().length > 0)
        {
            var search = $(this).val();

            $.get("{{ route('users.search') }}", {search: search}, function (res)
            {
                $('#results').html(res);
            });

            return;
        }

        $('#results').empty();
    });

    $(document).on('click', '.post-link', function ()
    {
        var userId = $(this).data('id');

        $.get("{{ url('users/show') }}", {id: userId}, function (res)
        {
            $('#results').empty();
            $('.search').val('');
            $('#post').html(res);
        });
	});

    $(document).on('click', '.post', function ()
    {
        var userId = $(this).data('id');

        $.get("{{ url('users/show') }}", {id: userId}, function (res)
        {
            $('#results').empty();
            $('.search').val('');
            $('#post').html(res);
        });
    });
});
