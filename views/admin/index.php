<?php $view->script('todo', 'example:js/todo.js', 'vue') ?>

<h1>TODO</h1>

<form v-on="submit: add" id="todo" class="uk-form">

    <div class="uk-align-right">
        <a href="" v-on="click: save" class="uk-button uk-button-primary">Save</a>
    </div>

    <div>
        <input v-model="newEntry"
               v-el="newEntry"
               class="uk-input-large uk-width-1-2"
               placeholder="I need to...">

        <input type="submit" class="uk-button" v-on="click: add" value="Add Task">
    </div>

    <hr/>

    <div v-show="config.entries.length">
        <h2>Tasks ({{ config.entries.length }})</h2>

        <table class="uk-table">

            <tr v-repeat="entry: config.entries">

                <td v-on="dblclick: edit(entry)" class=" uk-h3 {{ entry.done ? 'uk-text-muted' : '' }}">{{ entry.message }}</td>
                <td>
                    <button v-on="click: edit(entry)" class="uk-button">Edit</button>
                    <button v-on="click: toggle(entry, $event)" class="uk-button"><i class="uk-icon-check" v-id="!entry.done"></i> {{ (entry.done ? "Undo" : "Done" )}}</button>
                    <button v-on="click: remove(entry)" class="uk-button uk-button-danger" v-if="entry.done"><i class="uk-icon-remove"></i></button>
                </td>

            </tr>
        </table>
    </div>

</form>

