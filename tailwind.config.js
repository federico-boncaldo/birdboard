module.exports = {
  theme: {
    backgroundColor:{
    	page: 'var(--page-background-color)', //bg-page
    	card: 'var(--card-background-color)',
    	button: 'var(--button-background-color)',
    	header: 'var(--header-background-color)'
    },
    extend: {
	    boxShadow: {
	    	default: '0 0 5px 0 rgba(0, 0, 0, 0.08)'
	    },
	    colors: {
	    	'grey': 'rgba(0, 0, 0, 0.4)',
	    	'grey-light': '#F5F6F9',
	    	'white': '#FFFFFF',
	    	'blue' : '#47cdff',
	    	'blue-light' : '#8ae2f2',
	    	'red' : '#FF0000',
	    	'default' : 'var(--text-default-color)',
			  accent: 'var(--text-accent-color)',
  			'accent-light': 'var(--text-accent-light-color)',
  			muted: 'var(--text-muted-color)',
  			'muted-light': 'var(--text-muted-light-color)',
        'error': 'var(--text-error-color)',
	    },
    },
  },
  variants: {},
  plugins: []
}
