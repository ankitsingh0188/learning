Sorting algorithms may require some extra space for comparison and temporary storage of few data elements.

## In-place Sorting:
These algorithms do not require any extra space and sorting is said to happen in-place, or for example, within the array itself.

## Not-in-place Sorting:
Sorting which uses equal or more space is called not-in-place sorting. Merge-sort is an example of not-in-place sorting.

## Stable Sorting: 
If a sorting algorithm, after sorting the contents, does not change the sequence of similar content in which they appear, it is called stable sorting.

## Unstable Sorting
If a sorting algorithm, after sorting the contents, changes the sequence of similar content in which they appear, it is called unstable sorting.

## Adaptive Algorithm:
A sorting algorithm is said to be adaptive, if it takes advantage of already 'sorted' elements in the list that is to be sorted. That is, while sorting if the source list has some element already sorted, adaptive algorithms will take this into account and will try not to re-order them.

## Non-Adaptive Sorting Algorithm
A non-adaptive algorithm is one which does not take into account the elements which are already sorted. They try to force every single element to be re-ordered to confirm their sortedness.


# Important Terms

## Increasing Order:
A sequence of values is said to be in increasing order, if the successive element is greater than the previous one. For example, 1, 3, 4, 6, 8, 9 are in increasing order, as every next element is greater than the previous element.

## Decreasing Order:
A sequence of values is said to be in decreasing order, if the successive element is less than the current one. For example, 9, 8, 6, 4, 3, 1 are in decreasing order, as every next element is less than the previous element.

## Non-Increasing Order:
A sequence of values is said to be in non-increasing order, if the successive element is less than or equal to its previous element in the sequence. This order occurs when the sequence contains duplicate values. For example, 9, 8, 6, 3, 3, 1 are in non-increasing order, as every next element is less than or equal to (in case of 3) but not greater than any previous element.

## Non-Decreasing Order:
A sequence of values is said to be in non-decreasing order, if the successive element is greater than or equal to its previous element in the sequence. This order occurs when the sequence contains duplicate values. For example, 1, 3, 3, 6, 8, 9 are in non-decreasing order, as every next element is greater than or equal to (in case of 3) but not less than the previous one.


## Bubble Sort:
Bubble sort is a simple sorting algorithm. This sorting algorithm is comparison-based algorithm in which each pair of adjacent elements is compared and the elements are swapped if they are not in order. This algorithm is not suitable for large data sets as its average and worst case complexity are of Ο(n2) where n is the number of items.


## Insertion Sort:
This is an in-place comparison-based sorting algorithm. Here, a sub-list is maintained which is always sorted. For example, the lower part of an array is maintained to be sorted. This algorithm is not suitable for large data sets as its average and worst case complexities are of Ο(n2), where n is the number of items.

# Step 1 − If it is the first element, it is already sorted. return 1;
# Step 2 − Pick next element
# Step 3 − Compare with all elements in the sorted sub-list
# Step 4 − Shift all the elements in the sorted sub-list that is greater than the value to be sorted
# Step 5 − Insert the value
# Step 6 − Repeat until list is sorted


## Selection Sort:
Selection sort is a simple sorting algorithm. This sorting algorithm is an in-place comparison-based algorithm in which the list is divided into two parts, the sorted part at the left end and the unsorted part at the right end. Initially, the sorted part is empty and the unsorted part is the entire list. This algorithm is not suitable for large data sets as its average and worst case complexities are of Ο(n2), where n is the number of items.

# Step 1 − Set MIN to location 0
# Step 2 − Search the minimum element in the list
# Step 3 − Swap with value at location MIN
# Step 4 − Increment MIN to point to next element
# Step 5 − Repeat until list is sorted

## Merge Sort:
Merge sort is a sorting technique based on divide and conquer technique. With worst-case time complexity being Ο(n log n), it is one of the most respected algorithms. Merge sort first divides the array into equal halves and then combines them in a sorted manner.

# Step 1 − if it is only one element in the list it is already sorted, return.
# Step 2 − divide the list recursively into two halves until it can no more be divided.
# Step 3 − merge the smaller lists into new list in sorted order.

## Shell Sort:
Shell sort is a highly efficient sorting algorithm and is based on insertion sort algorithm. This algorithm avoids large shifts as in case of insertion sort, if the smaller value is to the far right and has to be moved to the far left.

This algorithm uses insertion sort on a widely spread elements, first to sort them and then sorts the less widely spaced elements. This spacing is termed as interval. This interval is calculated based on Knuth's formula as −

# Knuth's Formula
h = h * 3 + 1
where − h is interval with initial value 1

# Step 1 − Initialize the value of h
# Step 2 − Divide the list into smaller sub-list of equal interval h
# Step 3 − Sort these sub-lists using insertion sort
# Step 3 − Repeat until complete list is sorted

## Quick Sort:
Quick sort is a highly efficient sorting algorithm and is based on partitioning of array of data into smaller arrays. A large array is partitioned into two arrays one of which holds values smaller than the specified value, say pivot, based on which the partition is made and another array holds values greater than the pivot value.

# Step 1 − Make the right-most index value pivot
# Step 2 − partition the array using pivot value
# Step 3 − quicksort left partition recursively
# Step 4 − quicksort right partition recursively