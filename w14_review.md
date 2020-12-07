#DBP 14주차 회고록

## 1. 새로 배운내용
<br>

#### <MongoDB로 데이터 생성, 조회, 수정, 삭제>
<br>

1) 데이터 생성
 - 데이터 베이스 선택
 ```
 use database
 ```
 - 데이터 한개 삽입
 ```
 db.myCollection.insertOne({x:1})
 ```
 - 데이터 여러개 삽입
 ```
 db.myCollection.insertMany([{x:2, y:3}, {x:4, y:[7, 8, 9]}])
 ```

 2) 데이터 조회
  - 전체 데이터 조회
  ```
  db.myCollection.find()
  ```
  - 특정 데이터 조회
  ```
  db.myCollection.find({x:1})
  db.myCollection.find({"y.0:7})
  db.myCollection.find({x:6}, {y:false})
  ```
  - 커서로 조회
  ```
  var cursor = db.myCollection.find()
  cursor.next()
  cursor.hasNext()
  ```
  3) 데이터 수정
  ```
  db.myCollection.replaceOne({x:2}, {x:10, y:11})
  db.myCollection.updateMany({x:4}, {$set: {y:15}})
  db.myCollection.updateMany({x:6},{$setL{"y.$[e]":17}}, {arrayFilters:[{e:7}]})
  ```
  4) 데이터 삭제
  - 데이터 한개 삭제
  ```
  db.myCollection.deleteOne({x:1})
  ```
  - 데이터 전체 삭제
  ```
  db.myCollection.deleteMany({})
  ```

## 2. 회고
(+)
NoSQL이라는 새로운 형식의 데이터 베이스를 배울 수 있어서 좋았다. 데이터 형식을 지정하지 않아도 되어서 편리하다.

(-)
관계형 데이터보다 데이터를 한번에 보기에는 불편한 거 같다.

(!)
이번 주차 수업을 듣기전 firebase를 사용해보며 NoSQL에 대해 처음 접해보았는데 사용법을 잘 모르고 데이터베이스를 다뤘던지라 이번 수업을 통해 NoSQL에 대해 배울 수 있어서 좋았다. NoSQL도 처음엔 생소한 단어로만 보였었는데 엔오에스큐엘이 아니라 노에스큐엘이라고 SQL을 사용하지 않는 데이터 베이스라고 제대로 알게 되었다. 확실히 관계형 데이터 베이스처럼 데이터 형식을 지정해 두지 않아 데이터를 조작하는 데 있어서는 편리하지만, 데이터를 조회할 때는 조금 형식이 없어 조금 불편한 것 같다.


실습링크: <https://youtu.be/nPQDrSiMFOI>
