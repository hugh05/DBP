package kr.ac.sungshin.w13;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class DBConnection {
private static String className = "oracle.jdbc.driver.OracleDriver";
private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
private static String user = "hr";
private static String password = "1234";
public static Connection getConnection() {
Connection conn = null;

try {
Class.forName(className);
conn = DriverManager.getConnection(url, user, password);
System.out.println("connection success");
return conn;
} catch (ClassNotFoundException e){
System.out.println("���� ����̹� ����");
return null;
} catch (SQLException e){
System.out.print("���� ���� : ");
if(e.getMessage().indexOf("ORA-28009") > -1)
System.out.println("������ �ʴ� ���� ���� ����");
else if(e.getMessage().indexOf("ORA-01017") > -1)
System.out.println("����/�н����� Ȯ��");
else if(e.getMessage().indexOf("IO") > -1)
System.out.println("IO - ����Ȯ�� !");
else
System.out.println("�⺻ ����Ȯ�� !");
return null;
}
}
}