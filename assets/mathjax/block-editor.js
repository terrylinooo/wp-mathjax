/**
 * WP MathJax - Gutenberg Block.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

( function( blocks ) {

	if (typeof window.mathjax_input === 'undefined') {
		console.log( '[wp-mathjax] MathJax input type is undefined.' );
	} else {
		var mathjax_input = window.mathjax_input;
	}

    blocks.registerBlockType( 'wp-mathjax/block', {

		title: 'WP MathJax',
	
		icon: 'editor-code',
	
		category: 'formatting',

		attributes: {
			content: {
				type: 'string',
				source: 'text',
				selector: 'div'
			}
		},

		edit: function( props ) {

			let content = props.attributes.content;
			let rendered;

			function onChangeContent( content ) {
				props.setAttributes( { content } );

				setTimeout( function() {
					mathjaxInit();
				}, 1000 );
			}
			
			try {

				if ( mathjax_input === 'TeX' ) {
					rendered = '<div class="mathjax">' + "\n" + '$$' + "\n" + content + "\n"  + '$$' + "\n" + '</div>';
				} else if ( mathjax_input === 'MathML' ) {
					rendered = '<div class="mathjax"><math display="inline" xmlns="http://www.w3.org/1998/Math/MathML" mode="display">' + "\n" + content + "\n" + '</math></div>';
				} else if ( mathjax_input === 'ASCIIMathML' ) {
					rendered = '<div class="mathjax">' + "\n" + '`' + "\n" + content + "\n"  + '``' + "\n" + '</div>';
				} else {
					rendered = '<span style="color: red; text-align: center;">Input type is undefined.</span>';
				}

			} catch ( e ) {
				rendered = `<span style="color: red; text-align: center;">${e}</span>`;
			}

			return wp.element.createElement(
				'div',
				{
					className: 'wp-block-mathjax-block-editor'
				},
				[
					wp.element.createElement(
						'div',
						{
							className: 'mathjax-editor'
						}, 
						[
							wp.element.createElement(
								wp.editor.PlainText, 
								{
									onChange: onChangeContent,
									value: content
								} 
							),
							wp.element.createElement( 'hr' )
						] 
					),
					wp.element.createElement(
						'div',
						{
							className: props.className,
							dangerouslySetInnerHTML: {  __html: rendered }
						} 
					)
				]
			);
		},

		save: function( props ) {
			let content = props.attributes.content;

			return wp.element.createElement(
				'div',
				{
					className: 'mathjax'
				},
				"\n" + content + "\n"
			);
        }
    } );
} )(
	window.wp.blocks
);
