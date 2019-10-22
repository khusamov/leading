/**
 * Создать массив с заранее известным числом элементов и заполнить его.
 * @param length Количество элементов массива.
 * @param callbackfn Заполняющая функция.
 * @param thisArg
 */
export default function createArray<U>(length: number, callbackfn: (index: number, length: number) => U, thisArg?: any): U[] {
	const result = Array(length).fill(undefined);
	return result.map((undefined, index) => callbackfn(index, length), thisArg);
}
