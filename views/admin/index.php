<?php $view->script('todo', 'example:js/todo.js', 'vue') ?>

<div id="todo" class="uk-form">

    <button v-on="click: save" class="uk-button uk-button-primary uk-align-right">Save</button>

    <h2>{{ config.entries.length }} Tasks</h2>

    <form class="uk-width-large-2-3" v-on="submit: add">
        <input class="uk-input-large uk-width-3-4" v-model="newEntry" v-el="newEntry" placeholder="New Task">
        <button class="uk-button" v-on="click: add">Add</button>
    </form>

    <hr>

    <div class="uk-alert" v-if="!config.entries.length">You can add your first task using the input field above. Go ahead!</div>

    <ul class="uk-list uk-list-line" v-if="config.entries.length">
        <li v-repeat="entry: config.entries" class="uk-text-large" v-class="uk-text-muted: entry.done">

            <span class="uk-align-right">
                <button v-on="click: toggle(entry)" class="uk-button">{{ entry.done ? "Undo" : "Do" }}</button>
                <button v-on="click: remove(entry)" class="uk-button uk-button-danger" v-if="entry.done"><i class="uk-icon-remove"></i></button>
            </span>

            {{ entry.message }}
        </li>
    </ul>

</div>