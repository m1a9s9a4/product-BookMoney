import Vue from 'vue';
import axios from 'axios';
import scaleLoader from 'vue-spinner/src/ScaleLoader';

Vue.component('scale-loader', scaleLoader);

new Vue({
    el: '.container',
    data() {
        return {
            keyword: '',
            books: {},
            message: null,
            isSearching: false,
            searchedKeyword: '',
        }
    },

    methods: {
        searchKeyWord() {
            this._setMessage(null);
            this._startSearching();
            if (! this.keyword) {
                this._endSearching();
                this._setMessage('検索ワードを入力してください。');
                return;
            }

            axios.get('/api/search/book/', {
                params: {
                    keyword: this.keyword
                }
            }).then(res => {
                this.books = res.data;
                this._endSearching();
                if (this.books.length < 1) {
                    this._setMessage('お探しの本は見つかりませんでした。');
                }
            }).catch(err => {
                this._endSearching();
                this._setMessage('お探しの本は見つかりませんでした。');
            });
        },

        _setMessage(message) {
            this.message = message;
        },

        _startSearching() {
            this.isSearching = true;
        },

        _endSearching() {
            this.isSearching = false;
            this.searchedKeyword = this.keyword;
        }
    }
});
