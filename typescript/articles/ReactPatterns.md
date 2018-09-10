Шаблоны для Реакта
==================

Описание пропсов по умолчанию
------------------------------

```typescript
import React, { Component } from 'react';

interface IListProps {
	data: string[];
	onItemClick?: (option: string | undefined) => void;
}

interface IListState {
	data: string[];
}

export default class List extends Component<Required<IListProps>, IListState> {
	public static defaultProps: Partial<IListProps> = {
		onItemClick: (option: string | undefined) => {}
	};
	// ...
}
```

Получение значение аттрибута data-*
-----------------------------------

```typescript
private onAction = (event: MouseEvent<HTMLAnchorElement>) => {
	const id: number = Number((event.target as HTMLAnchorElement).getAttribute('data-id'));
	// ...
}
```
