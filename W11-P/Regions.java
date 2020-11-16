package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Regions {

	public static void main(String[] args) {
		Regions regions = new Regions();
		regions.select();
		regions.insert();
		regions.select();
		regions.update();
		regions.select();
		regions.delete();
		regions.select();
	}
	
	// jdbc ����̹� �ε� �� ����Ŭ ����
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
	
	//���� ����
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
	
	//select
	private void select() {
		Connection conn = null;
		PreparedStatement psmt = null;
		ResultSet rs = null;
		String sql = "select * from REGIONS order by region_id asc";		
		// ����Ŭ�� ���� ���� �� ����� ��ȯ
		try {
			conn = this.getConnection(); 
			 psmt = conn.prepareStatement(sql);//string��ü statement��ü�� �Ѱ���
			 rs = psmt.executeQuery();//���� ����, resultset��� ��ȯ
			while(rs.next()) {
				System.out.print("region_id: " + rs.getString("region_id"));
				System.out.println("\tregion_name: " + rs.getString("region_name"));
			}//next()�� ��� �ϳ��ϳ��� �о��			
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, rs);
		}
	}
	
	private void update() {
		PreparedStatement psmt = null;
		Connection conn = null;
		
		String sql = "update regions set region_name = 'africa' where region_id = 4";		
		try {
			conn = this.getConnection(); 
			 psmt = conn.prepareStatement(sql);
			 int count = psmt.executeUpdate();
			System.out.println(count + " row updated");		
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}
	
	
	private void insert() {
		PreparedStatement psmt = null;
		Connection conn = null;
		
		String sql = "insert into regions VALUES (5, 'Oceania')";		
		
		try {
			conn = this.getConnection(); 
			 psmt = conn.prepareStatement(sql);
			 int count = psmt.executeUpdate();
			System.out.println(count + " row Inserted");		 
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}
	
	private void delete() {
		PreparedStatement psmt = null;
		Connection conn = null;
		
		String sql = "delete from regions where region_id = 5";		
		try {
			conn = this.getConnection(); 
			 psmt = conn.prepareStatement(sql);
			 int count = psmt.executeUpdate();
			System.out.println(count + " row deleted");		
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}

}
