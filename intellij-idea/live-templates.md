Live Temlates
=============

Что такое Живые Шаблоны? https://habr.com/ru/post/414813/






React Function Component with makeStyles
---------------------------------------

Параметр | Значение
-------- | ---------
Abbreviation        | cmp  
Description         | New React Function Component with makeStyles  
Folder              | React  
Applicable contexts | Everywhere/TypeScript/Statement  

##№# Edit variables:
Переменная | Значение
---------- | ----------
NAME       | `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
import React, {FunctionComponent} from 'react';
import use$NAME$Styles from './styles/use$NAME$Styles';

interface ITableProps {
	$END$
}

/**
 * $NAME$.
 */
const $NAME$: FunctionComponent<I$NAME$Props> = (
	({}) => {
		const styles = use$NAME$Styles();
		return (
			<div className={styles.$NAME$}>
				$NAME$
			</div>
		)
	}
);

export default $NAME$;
```








Style-file with makeStyles
---------------------------------------

Параметр | Значение
-------- | ---------
Abbreviation        | cmp  
Description         | Style-file with makeStyles
Folder              | React  
Applicable contexts | Everywhere/TypeScript/Statement  

##№# Edit variables:
Переменная | Значение
---------- | ----------
NAME       | `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
import {makeStyles} from '@material-ui/styles';

const use$NAME$Styles = (
	makeStyles({
		$NAME$: {
			
		}
	}, {
		name: '$NAME$Styles'
	})
);

export default use$NAME$Styles;
```












Index-file for New React Component
-------------------

Abbreviation: index  
Description: Index-file for New React Component  
Folder: React  
Applicable contexts: Everywhere/TypeScript/Statement  

Edit variables:  
NAME `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
export {default} from './$NAME$';
```

New React Component
-------------------

Abbreviation: cmp  
Description: New React Component  
Folder: React  
Applicable contexts: Everywhere/TypeScript/Statement  

Edit variables:  
NAME `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
import React, {Component, ReactNode} from 'react';
import styles from './$NAME$.module.scss';

interface I$NAME$Props {
	$END$
}

/**
 * $NAME$.
 */
export default class $NAME$ extends Component<I$NAME$Props> {
	public render(): ReactNode {
		return (
			<div className={styles.$NAME$}>
				$NAME$
			</div>
		);
	}
}
```







New React Component Styled
-------------------------

Abbreviation: cmp  
Description: New React Component  
Folder: React  
Applicable contexts: Everywhere/TypeScript/Statement  

Edit variables:  
NAME `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
import React, {Component, ReactNode} from 'react';
import {observer} from 'mobx-react';
import {$NAME$Div} from './$NAME$.style';

interface I$NAME$Props {
	$END$
}

/**
 * $NAME$.
 */
 @observer
export default class $NAME$ extends Component<I$NAME$Props> {
	public render(): ReactNode {
		return (
			<$NAME$Div>
				$NAME$
			</$NAME$Div>
		);
	}
}
```


