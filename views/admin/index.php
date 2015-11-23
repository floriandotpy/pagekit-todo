<?php $view->script('todo', 'todo:js/todo.js', 'vue') ?>

<div id="todo" class="uk-form">

    <button class="uk-button uk-button-primary uk-align-right" @click="save">{{ 'Save' | trans }}</button>

    <h2>{{ '{0} Tasks|{1} One Task|]1,Inf[ %count% Tasks' | transChoice entries.length {count:entries.length} }}</h2>

    <form class="uk-width-large-2-3" @submit="add">
        <input class="uk-input-large uk-width-3-4" placeholder="{{ 'New Task' | trans }}" v-model="newEntry">
        <button class="uk-button" @click="add">{{ 'Add' | trans }}</button>
    </form>

    <hr>

    <div class="uk-alert" v-if="!entries.length">{{ 'You can add your first task using the input field above. Go ahead!' | trans }}</div>

    <ul class="uk-list uk-list-line" v-if="entries.length">
        <li class="uk-text-large" v-for="entry in entries" :class="{'uk-text-muted': entry.done}">

            <span class="uk-align-right">
                <button @click="toggle(entry)" class="uk-button">{{ entry.done ? "Undo" : "Do" | trans }}</button>
                <button @click="remove(entry)" class="uk-button uk-button-danger" v-if="entry.done"><i class="uk-icon-remove"></i></button>
            </span>

            {{ entry.message }}
        </li>
    </ul>

</div>
