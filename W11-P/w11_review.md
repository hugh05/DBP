#DBP 11주차 회고록

## 1. 새로 배운내용
- JDBC 드라이버 로드 및 오라클 접속
```
private static String className = "oracle.jdbc.driver.OracleDriver";
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
	private static String user = "hr";
	private static String password = "1234";

	public Connection getConnection() {
		Connection conn = null;

		try {			
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("connection completed");						
		} catch (ClassNotFoundException | SQLException e) {
			System.out.println("connection failed");
			e.printStackTrace();
		}

		return conn;
	}
  ```

- 접속 끊기
```
  public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
		try {
			if(rs != null) rs.close();
			if(pstm != null) pstm.close();
			if( conn != null) conn.close();
			System.out.println("All closed!!");
		} catch(SQLException sqle) {
			System.out.println("Error!!");
			sqle.printStackTrace();
		}
	}
  ```

- select
```
private void select() {
		Connection conn = null;
		PreparedStatement psmt = null;
		ResultSet rs = null;
		String sql = "select * from REGIONS order by region_id asc";		
		// 오라클에 쿼리 전송 및 결과값 반환
		try {
			conn = this.getConnection();
			 psmt = conn.prepareStatement(sql);//string객체 statement객체에 넘겨줌
			 rs = psmt.executeQuery();//쿼리 동작, resultset결과 반환
			while(rs.next()) {
				System.out.print("region_id: " + rs.getString("region_id"));
				System.out.println("\tregion_name: " + rs.getString("region_name"));
			}//next()로 결과 하나하나씩 읽어옴			
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, rs);
		}
	}
  ```
- update, insert, delete
- 트랜잭션  
  : DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위, commit이나 rollback


## 2. 문제가 발생하거나 해결한 내용
- ORA-00001: unique constraint () violated : 무결성제약조건 에러

  --> 새로운 컬럼을 추가할 때 오류가 나서 한번 더 쿼리를 실행했는데 오류가 났을 뿐 이미 같은 값이 들어가 있어서 발생한 오류였다. 오류로 잘못 들어간 값을 삭제 한 후에 다시 제대로 된 값을 넣어 주었다.
- SQL 오류: ORA-00904: 'Africa': invalid identifier

  --> Afira값이 부절적한 식별자여서 생기는 오류라고 하는데 왜 부적절한 식별자인지는 모르겠다. 소문자로 바꾸어 africa라고 바꾸니 오류가 해결되었다.

- Exception in thread "main" java.lang.UnsupportedClassVersionError: db/Regions has been compiled by a more recent version of the Java Runtime (class file version 58.0), this version of the Java Runtime only recognizes class file versions up to 52.0

--> 컴파일러 버전 오류. Windows -> Preferences -> Java -> Compiler 에서 컴파일러 버전을 jdk에 맞는 버전으로 바꿔주면 해결 된다.

## 3. 참고할 만한 내용
- https://m.blog.naver.com/dkdnblack/70122956230
- https://alisyabob.tistory.com/85
- https://fruitdev.tistory.com/164

## 4. 회고
(+)
배웠던 자바와 데이터 베이스를 함께 사용하여 자바에서 데이터 베이스에 있는 데이터들을 조회, 삽입, 수정, 삭제할 수 있다는 것이 새로웠고 재밌었다.

(-)
기말고사가 다가온다...

(!)
기말과제... 어려울 거 같지만 뭔가 또 직접 만드는 과정이 기대되고 한학기 동안 배웠던 것을 잘 복습하며 좋은 결과물을 만들어 낼 수 있으면 좋겠다.

실습링크: <https://youtu.be/qUYXjmbTrMU>
