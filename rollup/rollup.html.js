/**
 * Шаблон HTML-файла.
 * @link https://github.com/rollup/plugins/tree/master/packages/html#template
 * @link https://github.com/rollup/plugins/blob/master/packages/html/lib/index.js#L27
 * @param attributes
 * @param files
 * @param publicPath
 * @param title
 * @returns {Promise<string>}
 */
export async function htmlTemplate({attributes, files, publicPath, title}) {
	const scripts = (
		(files.js || [])
			.map(({ fileName }) => {
				const attrs = makeHtmlAttributes(attributes.script);
				return `<script src="${publicPath}${fileName}" ${attrs}></script>`;
			})
			.join('\n')
	);

	const links = (
		(files.css || [])
			.map(({ fileName }) => {
				const attrs = makeHtmlAttributes(attributes.link);
				return `<link href="${publicPath}${fileName}" rel="stylesheet" ${attrs}>`;
			})
			.join('\n')
	);

	return (`
		<!doctype html>
		<html${makeHtmlAttributes(attributes.html)}>
			<head>
				<meta charset="utf-8">
				<title>${title}</title>
				<script>
					window.addEventListener('unhandledrejection', promiseRejectionEvent => {
						console.error(promiseRejectionEvent);
					});
				</script>
				${links}
			</head>
			<body>
				<div id='root'></div>
				${scripts}
			</body>
		</html>
	`);


}

function makeHtmlAttributes(attributes) {
	if (!attributes) {
		return '';
	}

	const keys = Object.keys(attributes);
	// eslint-disable-next-line no-param-reassign
	return keys.reduce((result, key) => (result += ` ${key}="${attributes[key]}"`), '');
}
