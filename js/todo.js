$(function(){

    var vm = new Vue({

        el: '#todo',

        data: {
            entries: window.$data.config.entries,
            newEntry: ''
        },

        methods: {

            add: function(e) {
                e.preventDefault();

                if(!this.newEntry) return;

                this.entries.push({
                    message: this.newEntry,
                    done: false
                });

                this.newEntry = '';
            },

            toggle: function(entry) {
                entry.done = !entry.done;
            },

            remove: function(entry) {
                this.entries.$remove(entry);
            },

            save: function() {

                this.$http.post('admin/todo/save', { entries: this.entries }, function() {
                    this.notify(this.$trans('Saved.'), '');
                }).error(function(data) {
                    this.notify(data, 'danger');
                });
            }

        }

    });

});
