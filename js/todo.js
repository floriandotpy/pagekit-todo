jQuery(function ($) {


    var vm = new Vue({

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

            toggle: function(entry, e) {
                e.preventDefault();
                entry.done = !entry.done;
            },

            remove: function(entry) {
                this.config.entries.$remove(entry);
            },

            edit: function(entry) {
                this.newEntry = entry.message;
                this.remove(entry);
                this.$$.newEntry.focus();
            },

            save: function(e) {
                e.preventDefault();

                this.$http.post('admin/example/save', { name: 'example', config: this.config }, function() {
                    UIkit.notify(vm.$trans('Saved.'), '');
                }).error(function(data) {
                    UIkit.notify(data, 'danger');
                });
            }

        }

    });

});
