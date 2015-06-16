$(function(){

    new Vue({

        el: '#todo',

        data: {
            config: window.$data.config,
            newEntry: ''
        },

        methods: {

            add: function(e) {
                e.preventDefault();

                if(!this.newEntry) return;

                this.config.entries.push({
                    message: this.newEntry,
                    done: false
                });

                this.newEntry = '';
            },

            toggle: function(entry) {
                entry.done = !entry.done;
            },

            remove: function(entry) {
                this.config.entries.$remove(entry);
            },

            save: function() {

                this.$http.post('admin/example/save', { config: this.config }, function() {
                    UIkit.notify(vm.$trans('Saved.'), '');
                }).error(function(data) {
                    UIkit.notify(data, 'danger');
                });
            }

        }

    });

});